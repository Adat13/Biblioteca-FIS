<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{

    use HasFactory;
    protected $table = 'libros';
    protected $fillable = [
        'titulo',
        'autor',
        'anio',
        'editorial',
        'edicion',
        'codigo',
        'ejemplar',
        'estado'
    ];

    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class, 'libros_id');
    }
}
