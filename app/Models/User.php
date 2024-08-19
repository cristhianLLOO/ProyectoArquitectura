<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users'; 
    protected $primaryKey = 'id_usuario'; 
    
    
    protected $fillable = ['nombre', 'apellido', 'telefono', 'password'];

    protected $hidden = ['password', 'remember_token'];

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id_usuario');
    }

   // En tu modelo User
public function historialCompras()
{
    return $this->hasMany(HistorialCompra::class, 'id_usuario', 'id_usuario');
}


}
