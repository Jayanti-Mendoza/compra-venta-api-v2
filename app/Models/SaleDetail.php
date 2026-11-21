<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    use HasFactory;
    /**nombre real de la tabla en la BD */
    protected $table= 'detalle_ventas';

    /**
     * Campos asignables
     */
    protected $fillable = [
        'sale_id',
        'product_id',
        'quantity',
        'unit_price',
        'subtotal',
    ];
    /**Relación un detalle pertenece a una ventana */
    public function sale()
    {
        return $this->belongTo(Sale::class, 'sale_id');
    }
    /**Relación: un detalle pertenece a un producto */
    public function product()
    {
        return$this->belongsTo(Product::class, 'product_id');
    }
}

