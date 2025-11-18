<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Empleado;

class Area extends Model
{
    use HasFactory;

    protected $table = 'area';
    protected $primaryKey = 'id';
    protected $fillable = [

        'nombre',
        'codigo',
        'status',
        'presupuesto'
        
    ];

	public $timestamps = true;

   public function empleados()
    {
        return $this->hasMany('App\Models\Empleado', 'id_area');
    }


}
