<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;


class Users extends Authenticatable

{
    use HasFactory, HasRoles;


        protected $table = 'users';
        protected $primaryKey = 'id';
        protected $fillable = [
            'rfc',
            'name',
            'email_verified_at'                                                                                                                                                                                                                                                                                                                                                                                         
        
        ];

         protected $hidden = [
        'password',
        'remember_token',
    ];


    public $timestamps = true;
    
    public function getAuthIdentifierName()
    {
    return 'rfc';
    }

    public function empleado()
    {
        return $this->hasOne(Empleado::class, 'id_user');
    }

    public function historiales()
    {
        return $this->hasMany(Historial::class, 'id_historial');
    }

  
    public function emailTokens()
    {
        return $this->hasMany(EmailToken::class, 'id_user');
    }
    



    /*public function ordenesExpedientes(){
        return $this->hasMany('App\OrdenExpediente','anio');
    }

    public function anios(){
        return $this->hasMany('App\MetodoSugerenciaTipoOrdenAnio','id_anio'); */
}

