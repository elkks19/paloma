<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Categoria extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categorias';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
    ];

    public function productos() : BelongsToMany
    {
        return $this->belongsToMany(Producto::class, 'productos_tienen_categorias');
    }
}
