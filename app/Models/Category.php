<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
/**
 * Nombre real de la tabla en la base de datos
 */
protected $table = 'categories';
/**
 * campos asignables
 */

    protected $fillable = [
        'name',
        'description',
    ];
    /**
     * Relación: una categoría puede tener muchos productos
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'Category.php_id');
    }
}
