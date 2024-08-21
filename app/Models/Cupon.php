<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    protected $table = 'cupones'; 
    protected $primaryKey = 'id'; 
    
   
    protected $fillable = ['nombre', 'descuento', 'fecha_de_vencimiento'];
    use HasFactory;
    
}
