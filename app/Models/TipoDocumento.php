<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    use HasFactory;
    /**Nombre real de la BD */
    protected $table ='tipodocumento';

    /**campos asignables */
    protected $fillable =[
        'name',
        'description',
        'type',
    ];
    /**relación un tipo de documento puede usarse en muchsd compras  */
    public function purchase()
    {
        return $this->hasMany(Purchase::class, 'tipodocumento_id');
    }
    /**relación un tipo de documento puede usarse en muchas ventas */
    public function sales()
    {
        return $this->hasMany(Sale::class, 'tipodocumento_id');
    }
}
