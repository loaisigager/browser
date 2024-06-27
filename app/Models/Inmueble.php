<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inmueble extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla si no sigue la convención de nombres de Laravel
    protected $table = 'inmuebles';

    // Especifica los campos que se pueden asignar masivamente
    protected $fillable = ['Ciudad', 'Tipo', 'Precio'];

    // Si tienes timestamps (created_at, updated_at), y si no los usas, desactívalos
    public $timestamps = false;


}

