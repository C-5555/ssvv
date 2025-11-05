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
        'id_area', 
        'puesto',
        'fecha_ingreso',
        'email',
        'rfc',
        'status',
        'id_solicitud'

    ];

	public $timestamps = true;

    protected $appends = ['encrypted_id'];

    public function empleado(){
      return $this->hasMany('App\User', 'id_empleado', 'id');
    }

     public function area(){
      return $this->hasOne('App\Area', 'id_area', 'id');
    }

    public function solicitud(){
      return $this->hasMany('App\Solicitud', 'id_solicitud', 'id');
    }

    public function usuarios(){
      return $this->hasMany('App\Usuarios', 'id_usuarios', 'id');
    }



    public function getEncryptedIdAttribute()
    {
        return Crypt::encryptString($this->id);
    }

    
}
