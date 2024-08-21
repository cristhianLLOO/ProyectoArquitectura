<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;

    protected $table = 'carrito_compra'; 
    protected $primaryKey = 'id_carrito_compra'; 
  
    protected $fillable = ['id_usuario', 'id_producto', 'cantidad'];

    // Relación con el modelo Productos
    public function producto()
    {
        return $this->belongsTo(Productos::class, 'id_producto', 'id_producto');
    }

    // Relación con el modelo User
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id_usuario');
    }
}
