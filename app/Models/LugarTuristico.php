<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\MorphOne;

class LugarTuristico extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'lugares_turisticos';

    public function lugar() : MorphOne
    {
        return $this->morphOne(Lugar::class, 'negocio');
    }
}
