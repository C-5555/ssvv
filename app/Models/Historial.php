<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historial extends Model
{
    use HasFactory;

    protected $table = 'historial';
    protected $primaryKey = 'id';
    protected $fillable = [

        'id_empleado',
        'id_solicitud'
    ];

    public $timestamps = true;

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }
    
    public function solicitudes()
    {
        return $this->belongsTo(Solicitud::class, 'id_solicitud');
    }

    public function motivos()
    {
        return $this->belongsTo(Motivo::class, 'id_motivo');
    }

    
}
