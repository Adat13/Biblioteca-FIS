<?php

// app/Http/Controllers/SolicitudController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;

class SolicitudController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        // Filtrar solicitudes donde estado_solicitud es 0
        $solicitudes = Solicitud::with(['libro', 'estudiante'])
            ->where('estado_solicitud', 0)
            ->when($search, function ($query, $search) {
                return $query->whereHas('libro', function ($query) use ($search) {
                    $query->where('titulo', 'like', '%' . $search . '%');
                })->orWhereHas('estudiante', function ($query) use ($search) {
                    $query->where('nombre', 'like', '%' . $search . '%');
                });
            })
            ->paginate(10);

        return view('solicitudes.index', compact('solicitudes', 'search'));
    }

    public function accept(Request $request, $id)
        {
            $validated = $request->validate([
                'fecha_entrega' => 'required|date',
                'fecha_devolucion' => 'required|date|after_or_equal:fecha_entrega',
            ]);

            $solicitud = Solicitud::find($id);
            if ($solicitud) {
                $solicitud->estado_solicitud = 1; // Estado aceptado
                $solicitud->fecha_inicio = $validated['fecha_entrega']; // Fecha de entrega proporcionada
                $solicitud->fecha_devolucion = $validated['fecha_devolucion']; // Fecha de devolución proporcionada
                $solicitud->estado_devolucion = 1; // Estado de devolución pendiente
                $solicitud->save();

                return response()->json(['success' => true, 'message' => 'Solicitud aceptada exitosamente.']);
            } else {
                return response()->json(['success' => false, 'message' => 'Solicitud no encontrada.'], 404);
            }
        }


        public function reject($id)
        {
            $solicitud = Solicitud::find($id);
            $solicitud->estado_solicitud = -1; // Estado rechazado
            $solicitud->save();

            return redirect()->route('solicitudes.index')->with('success', 'Solicitud rechazada exitosamente.');
        }

}
