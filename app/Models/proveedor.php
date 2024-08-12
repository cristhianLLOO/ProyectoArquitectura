<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores';

    protected $fillable = [
        'first_name',   // Nombre del proveedor
        'company',      // Compañía
        'email',        // Correo electrónico
        'delivery_date', // Fecha de entrega
        'product_name', // Nombre del producto
        'quantity',     // Cantidad
    ];
}
