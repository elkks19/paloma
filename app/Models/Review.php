<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'reviews';

    protected $appends = [
        'nombre_usuario'
    ];

    protected $fillable = [
        'user_id',
        'lugar_id',
        'contenido',
        'calificacion',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function negocio() : BelongsTo
    {
        return $this->belongsTo(Lugar::class);
    }

    protected function nombreUsuario(): Attribute
    {
        return new Attribute(
            get: fn() => $this->user->name
        );
    }
}
