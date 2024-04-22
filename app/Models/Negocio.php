<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Negocio extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'negocios';

    public function lugar() : MorphOne
    {
        return $this->morphOne(Lugar::class, 'negocio');
    }

    public function productos() : HasMany
    {
        return $this->hasMany(Producto::class);
    }
}
