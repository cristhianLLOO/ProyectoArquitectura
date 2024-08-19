<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    protected $table = 'productos'; 
    protected $primaryKey = 'id_producto'; 
    
    
    protected $fillable = [
    "nombre_archivo_imagen","path_imagen","nombre","descripcion","precio","categoria","stock",
    ];
  
    public function historialCompras()
{
    return $this->hasMany(HistorialCompra::class, 'id_producto', 'id_producto');
}

}
