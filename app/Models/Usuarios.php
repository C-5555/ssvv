<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;
        protected $table = 'Usuarios';
            protected $primaryKey = 'id';
            protected $fillable = [
                'id_empleado', 
                'nickname', 
                'created_at', 
                'updated_at'
            ];

}




    
/*     public function getIdEncriptedAttribute()
    {
        return Hashids::encode($this->id);   
    }

    public function ordenesExpedientes(){
        return $this->hasMany('App\OrdenExpediente','anio');
    }

    public function anios(){
        return $this->hasMany('App\MetodoSugerenciaTipoOrdenAnio','id_anio'); */
