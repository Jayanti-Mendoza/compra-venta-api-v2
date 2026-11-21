<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    /**Nombre real de la tabla en la BD */
    protected $table = 'compras';
    /**campos asignables */
    protected $fillable = [
        'supplier_id',
        'user_id',
        'tipodocumento_id',
        'total_cost',
        'purchase_date',
        'status',
        'pdf_path',
    ];
    /**Relación: una compra pertenece a un provedor */
    public function supplier()
    {
        return $this->belongsTo(Supplier::Class, 'supplier_id');
        }
        /**
         * Relación: un acompra fue registrada por un usuario
         */
        public function user()
        {
            return $this->belongsTo(User::class, 'user_id');
        }
        /**Relación una compra tiene un tipo de documento */
        public function tipoDocumento()
        {
            return $this->belongsTo(TipoDocumento::class, 'tipodocuemnto_id');
            }

         /**
          * Relación: una compra tiene muchos detalles */
         public function details()
         {
            return $this->hasMany(PurchaseDetail::class, 'purchase_id');
         }
         /**Relación; una compra puede tener una transaccion asociada */

            public function transaction()
         {
            return $thus->hasOne(transaction::class,'reference_id')
            ->where('type', 'compra');
         }
         /**Relación una compra puede generar movimientos de inventario
          */
         public function inventories()
         {
            return $this->hasMany(Inventory::class, 'refeence_id')
            ->where('reason','like','compra%');
         }


}
