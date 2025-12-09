<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Solicitud extends Model
{
    use HasFactory;

    protected $table = 'solicitud';
    protected $primaryKey = 'id';
    protected $fillable = [

        'id',
        'id_empleado',
        'motivo',
        'fecha_solicitud',
        'estado',
        'fecha_status',
        'dias_solicitados',
        'monto_solicitado',
        'detalles'
        
    ];

	public $timestamps = true;
    protected $appends = ['encrypted_id'];

     public function getEncryptedIdAttribute()
    {
        return Crypt::encryptString($this->id);
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }
    
    public function  motivos()
    {
        return $this->masMany(Motivo::class, 'id_motivo');
    }


}
