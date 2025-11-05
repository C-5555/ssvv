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
        'dias_solicitados',
        'status',
        'fecha_status',
        'motivo',
        'monto_solicitado'
        
    ];

	public $timestamps = true;
    protected $appends = ['encrypted_id'];

     public function getEncryptedIdAttribute()
    {
        return Crypt::encryptString($this->id);
    }
}
