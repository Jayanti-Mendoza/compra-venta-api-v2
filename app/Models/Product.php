<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    /**
     * Nombre real de la tabla en la base de datos
     */
    protected $table = 'products';

    /**
     * campos asignables
     */
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'price',
        'quantity',
        'category_id',
        'status',
        'barcode',
        'qrcode',
        'fechavecimiento'
    ];
    /**
     * Relación: un producto pertenece a una categoría
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Relación: un producto fue creado por un usuario
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    /**
     * Relación: un producto puede tener muchas imágenes
     */
    public function images()
    {
        return $this->hasMany(Image::class, 'product_id');
    }
    /**
     * Relación: un producto puede tener muchos detalles
     */
    public function purchaseDetails()
    {
    return $this->hasMany(PurchaseDetail::class, 'product_id');
    }
    /**
     * Relación: un producto puede tener muchos detalles de venta
     */
    public function saleDetails()
    {
    return $this->hasMany(SaleDetail::class, 'product_id');
    }
    /**
     * Relación: un producto puede tener muchosmovimientos de inventario
     */
    public function inventories()
    {
        return $this->hansMany(Inventory::Class, 'product_id');
    }

}
