<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

use App\Models\User;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }


    public function register(): User
    {
        return User::create([
            'name' => $this->input('name'),
            'email' => $this->input('email'),
            'password' => Hash::make($this->input('password')),
        ]);
    }

    /**
     * Get the validated data from the request.
     *
     * @return array<string, mixed>
     */
    public function authenticate() : string
    {
        $this->ensureIsNotRateLimited();

        if (! Auth::attempt($this->only('email', 'password')))
        {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }


        RateLimiter::clear($this->throttleKey());

        $user = Auth::user();

        $token = "";

        if($user->hasRole('admin')){
            $token = $user->createToken('token', ['admin:'.$user->name]);
        }
        else if($user->lugar()->exists()){
            $token = $user->createToken('token', ['negocio:'.$user->lugar->nombre]);
        }
        else{
            $token = $user->createToken('token', ['usuario:'.$user->id]);
        }

        return $token->plainTextToken;
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->input('email')).'|'.$this->ip());
    }
}
