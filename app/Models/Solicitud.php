<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    protected $table = 'solicitudes'; // Verifica que el nombre de la tabla sea el correcto

    protected $fillable = [
        'libro_id',
        'estudiantes_id',
        'user_id',
        'fecha_inicio',
        'fecha_devolucion',
        'estado_solicitud',
        'estado_devolucion',
    ];

    protected $casts = [
        'estado_solicitud' => 'integer',
        'estado_devolucion' => 'integer',
    ];

    public function libro()
    {
        return $this->belongsTo(Libro::class, 'libros_id');
    }

    public function estudiante()
    {
        return $this->belongsTo(Estudiantes::class, 'estudiantes_id');
    }
}
