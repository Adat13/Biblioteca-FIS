<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamos extends Model
{
    use HasFactory;

    protected $table = 'solicitudes';
    protected $fillable = ['id','libros_id', 'estudiantes_id', 'user_id', 'fecha_inicio', 'fecha_devolucion', 'estado_solicitud', 'estado_devolucion'];
    public $timestamps = true; // Mantener el manejo automático de timestamps

    // Relaciones
    public function libro()
    {
        return $this->belongsTo(Libro::class, 'libros_id');
    }

    public function estudiante()
    {
        return $this->belongsTo(Estudiantes::class, 'estudiantes_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
