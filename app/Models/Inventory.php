<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    /**Nombre real de la table en la BD */
    protected $table = 'inventories';
    /**campos asignables */
    protected $fillable =[
        'product_id',
        'type',
        'quantity',
        'reason',
        'user_id',
        'created_at',
    ];
    /**Relación: el movimiento pertenece a un producto */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    /**Relacion el movimiento fue realizado por un usuario */
    public function user() {
        return$this->belongsTo(User::class, 'user_id');
    }
    /**Relación: si el movimiento proviene de una compra  */
    public function purchase()
    {
        return $this->belongsTo(Purchase::class, 'reference_id')
        ->where('reason','like', 'compra%');
    }
    /**Relacion:si el moviemto proviene de una venta */
    public function sale()
    {
        return $this->belongsTo (Sale::class, 'reference_id')
        ->where('reason', 'like','venta%');
    }
}
