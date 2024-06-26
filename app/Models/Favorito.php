<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Favorito extends Model
{
    use HasFactory;

    protected $table = 'favoritos';

    public $timestamps = false;

    public function usuario() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function lugar() : BelongsTo
    {
        return $this->belongsTo(Lugar::class);
    }
}
