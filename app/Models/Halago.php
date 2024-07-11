<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Halago extends Model
{
    use HasFactory;


    // Opcional: si tu tabla no sigue la convención de Laravel (nombre de tabla plural y en minúscula)
    protected $table = 'halagos';

    // Opcional: si tu tabla no tiene timestamps
    public $timestamps = false;

    public function inmuebles()
    {
        return $this->hasMany(Inmueble::class, 'Ciudad', 'Ciudad');
    }
}


