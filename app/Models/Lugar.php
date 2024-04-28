<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Observers\LugarObserver;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy(LugarObserver::class)]
class Lugar extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'lugares';

    protected $attributes = [
        'menu' => '[]',
        'calificacion' => 0.0,
    ];

    protected $fillable = [
        'nombre',
        'descripcion',
        'ubicacion',
        'menu',
        'contacto',
        'tipo',
    ];

    protected function casts(): array
    {
        return [
            'menu' => 'array',
            'ubicacion' => 'array',
        ];
    }

    public function productos() : HasMany
    {
        return $this->hasMany(Producto::class);
    }

    public function reviews() : HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function dueno() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
