<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Empleado extends Model
{
    protected $table = 'empleados';
    protected $primaryKey = 'id';
    protected $fillable = [

        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'id_departamento', 
        'puesto',
        'fecha_ingreso',
        'email',
        'rfc',
        'foto',
        'status',
        'id_solicitud'

    ];

	public $timestamps = true;

    
}
