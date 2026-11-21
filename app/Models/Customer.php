<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    /** Nombre real de la tabla en la BD */
    protected $table = 'customers';
    /**Campos asignables */
    protected $fillable = [
        'ruc',
        'name',
        'email',
        'phone',
        'address',
        'photo',
        'status',
    ];
    /**Relación: un cliente puede tener muchas ventas  */
    public function sales(){
        return $this->hasMany(Sale::class, 'customer_id');
    }
}
