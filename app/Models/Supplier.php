<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    /**
     * Nombre real de la tabla en la base de datos
     */
    protected $table ='suppliers';
    /**campos asignables */
    protected $fillable =[
        'ruc',
        'name',
        'email',
        'phone',
        'address',
        'photo',
        'status',
    ];
    /**Relacion: un porvvedor puede tener muchas compras */
    public function purchases()
    {
        return $this->hasMany(Purchase::class, 'supplier_id');
    }
}
