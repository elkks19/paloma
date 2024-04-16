<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Observers\ProductoObserver;

#[ObservedBy(ProductoObserver::class)]
class Producto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
    ];

    public function negocio() : BelongsTo
    {
        return $this->belongsTo(Negocio::class);
    }

    public function categorias() : BelongsToMany
    {
        return $this->belongsToMany(Categoria::class, 'productos_tienen_categorias');
    }
}
