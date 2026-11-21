<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    /**Nombre real de la tabla BD */
    protected $table='ventas';

    /**campos asignables */
    protected $fillable =[
        'customer_id',
        'user_id',
        'tipodocumento_id',
        'total_price',
        'sale_date',
        'status',
        'pdf_path',
        'payment_method',
    ];
    /**Relación: una ventana pertenece a un cliente */
    public function customer()
    {
        return $this-belongsTo(Customer::class, 'customer_id');
    }
    /**Relación una venta fue registrada por un usuario */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    /**Relación:una venta tiene un tipo de documento */
    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'tipodocumento_id');
    }
    /**Relación una venta tiene muchos detalles */
    public function detalis()
    {
    return
        $this->hasMany(SaleDetail::class, 'sale_id');
    }
    /**Relación::una venta puede tener una transacción asociada */
    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'reference_id')
        ->where('type', 'venta');
    }
    /**
     * Relación:una venta puede generar movimientos de inventario
     */
    public function inventories()
    {
        return $this->hasMany(Invetory::class, 'reference_id')
        ->where('reason', 'like','venta%');
    }
}
