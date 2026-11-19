<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    /**Nombre real de la base de datos */
    protected $table = 'product_image';
    /**
     * campos asignables
     */
    protected $fillable = [
        'product_id',
        'image_path',
    ];
    /**
     *Relación:una imagen pertence a un producto */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
