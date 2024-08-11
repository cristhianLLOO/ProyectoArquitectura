<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proveedor extends Model
{
    use HasFactory;
    protected $table = 'proveedores';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'entrega',
        'product',
        'cantidad',
    ];
}

