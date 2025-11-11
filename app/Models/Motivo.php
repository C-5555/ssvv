<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motivo extends Model
{
    use HasFactory;

    protected $table = 'motivo';
    protected $primaryKey = 'id';
    protected $fillable = [

        'tipo',
        'clave',
        'id_empleado'
    ];
    
    public $timestamps = true;

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }
    
}
