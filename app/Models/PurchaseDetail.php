<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    use HasFactory;
    /**
     * Nombre real de la tabla en la BD
     */
    protected $table ='detalle_compras';

    /**campos asignables */
    protected $fillable =[
        'purchase_id',
        'product_id',
        'quantity',
        'unit_cost',
        'subtotal',
    ];
    /**Relación: un detalle pertenece a una compra */
    public function purchase()
    {
        return $this->belongsTo(Purchase::class,purchase_id);
    }
    /**Relación: un detalle pertenece a un producto */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
