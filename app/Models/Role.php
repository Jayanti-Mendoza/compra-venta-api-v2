<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    /**
     * Nombre real de la tabla en la base de datos
     */
    protected $table = 'roles';
    /**
     * Campos asignables en masa
     */
    protected $fillable = [
        'name',
        'description',
    ];
    /**
     * Relación: un rol tiene muchos usuarios
     */
    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
