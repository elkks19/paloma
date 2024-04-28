<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'reviews';

    protected $fillable = [
        'contenido',
        'calificacion',
    ];

    public function usuario() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function negocio() : BelongsTo
    {
        return $this->belongsTo(Lugar::class);
    }
}
