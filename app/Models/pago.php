<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pago extends Model
{
    protected $table = 'opc_pago'; 
    protected $primaryKey = 'id_opc_pago'; 
    
    
    protected $fillable = ['id_usuario', 'tipo_tarjeta', 'numero_tarjeta', 'fecha_vencimiento'];
    use HasFactory;
}
