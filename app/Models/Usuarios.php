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
            'password',   
            'id_empleado', 
            'admin',
            'id_historial'
        
        ];

    public $timestamps = true;

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }

    public function historiales()
    {
        return $this->hasMany(Historial::class, 'id_historial');
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
}
