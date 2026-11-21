<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    /**Nombre real de la tabla en la BD */
    protected $table ='transactions';

    /**campos asignables */
    protected $fillable =[
        'type',
        'amount',
        'reference_id',
        'description',
        'user_id',

    ];
    /**Relación:la transaccion pertenece a un usuario */
    public function user()
    {
        return $this->belongTo(User::class, 'user_id');
    }
    /**Relación: si la transacción esta vinculada a una compra */
    public function purchase()
    {
        return $this->belongsTo(Purchase::class, 'reference_id')
        ->where('type', 'venta');
    }
}
