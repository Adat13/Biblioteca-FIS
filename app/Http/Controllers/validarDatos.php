<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiantes;
use App\Models\Libro;
use App\Models\Solicitud;
use Carbon\Carbon;

class validarDatos extends Controller
{
    public function validar(Request $request)
    {
        $validateData=$request->validate([
            'nombre' => 'required|string',
            'dni' => 'required|integer',
            'codigo' => 'required|string',
            'titulo_libro' => 'required|string', // Añadir la validación del título del libro
            'autor' => 'required|string', // Añadir la validación del autor del libro
        ]);

        
        // Consultar en la base de datos si el estudiante existe
        $estudiante = Estudiantes::where('nombre', $validateData['nombre'])
            ->where('dni', $validateData['dni'])
            ->where('codigo', $validateData['codigo'])
            ->first();
        // consultar en la base de datos el libro
        $libro = Libro::where('titulo', $validateData['titulo_libro'])
            ->where('autor', $validateData['autor'])
            ->first();

        if ($estudiante) {
            if ($libro) { // Registrar la solicitud en la base de datos
                /*$solicitud = Solicitud::create([
                    'titulo_libro' => $request->titulo_libro,
                    'autor' => $request->autor,
                    'nombre_usuario' => $request->nombre,
                    'estado' => "pendiente", // Puedes establecer el estado inicial aquí
                ]);*/
                $solicitud = new Solicitud();

                $solicitud->libros_id = $libro->id;
                $solicitud->estudiantes_id = $estudiante->id;
                $solicitud->users_id = null;
                $solicitud->estado_solicitud = 0;
                $solicitud->estado_devolucion = 0;
                $solicitud->save();

                return response()->json(['valido' => true, 'estudiante' => $estudiante]);
            } else {
                // Libro no encontrado
                return response()->json(['valido' => false, 'message' => 'Libro no encontrado']);
            }
        } else {
            // Estudiante no encontrado
            return response()->json(['valido' => false, 'message' => 'Estudiante no encontrado']);
        }
    }
}
