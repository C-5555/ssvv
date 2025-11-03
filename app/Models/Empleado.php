<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;



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
        'status',
        'id_solicitud'

    ];

	public $timestamps = true;

    protected $appends = ['encrypted_id'];

    public function usuario(){
      return $this->hasMany('App\User', 'id_empleado', 'id');
    }

    public function getEncryptedIdAttribute()
    {
        return Crypt::encryptString($this->id);
    }

    
}
