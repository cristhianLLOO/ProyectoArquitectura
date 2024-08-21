<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialCompra extends Model
{
    use HasFactory;

    protected $table = 'historial_compras'; 
    protected $primaryKey = 'id_historial'; 
    
    protected $fillable = ['id_usuario', 'id_producto', 'cantidad', 'fecha_compra'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id_usuario');
    }

    

    // En tu modelo HistorialCompra
public function producto()
{
    return $this->belongsTo(Productos::class, 'id_producto', 'id_producto');
}

}


