<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Models\Area;




class Empleado extends Model
{
  protected $table = 'empleados';
  protected $primaryKey = 'id';
  protected $fillable = [
    'id_user',
    'nombre',
    'apellido_paterno',
    'apellido_materno',
    'id_area', 
    'puesto',
    'fecha_ingreso',
    'email',
    'status'

  ];

	public $timestamps = true;

  protected $appends = ['encrypted_id'];

 /*  public function empleado(){
    return $this->hasMany('App\User', 'id_empleado', 'id');
  } */
     public function user()
    {
        return $this->belongsTo(Users::class, 'id_user');
    }

   public function area()
    {
        return $this->belongsTo('App\Models\Area', 'id_area');
    }

  /* public function solicitudes(){
    return $this->hasMany('App\Models\Solicitud', 'id_solicitud', 'id');
  }

  public function historiales(){
   return $this->hasMany('App\Models\Historial', 'id_historial', 'id');
  }

  public function users()
    {
        return $this->belongsTo(Empleado::class, 'id_user');
    }

  public function motivos(){
    return $this->hasMany('App\Models\Motivo', 'id_motivo', 'id');
  }
 */
  

   


  public function getEncryptedIdAttribute()
  {
    return Crypt::encryptString($this->id);
  }

  
}
