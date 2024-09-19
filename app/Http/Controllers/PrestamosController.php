<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamos;
use Barryvdh\DomPDF\Facade\Pdf;

class PrestamosController extends Controller
{
    public function index(Request $request)
    {
        // Obtener el parámetro de búsqueda del request
        $search = $request->input('search');

        // Consulta inicial de todas las solicitudes con posible filtro aplicado
        $prestamosQuery = Prestamos::query();

        if ($search) {
            $prestamosQuery->whereHas('estudiante', function ($query) use ($search) {
                $query->where('nombre', 'like', "%{$search}%");
            });
        }

        // Aplicar paginación después del filtro
        $prestamos = $prestamosQuery->paginate(10);

        // Mantener los parámetros de búsqueda en la paginación
        $prestamos->appends($request->all());

        // Devolver la vista con los resultados paginados y los parámetros de búsqueda
        return view('registros.prestadosLibro', compact('prestamos'));
    }

    public function update(Request $request, $id)
    {
        // Encontrar el préstamo por su ID
        $prestamo = Prestamos::findOrFail($id);

        // Verificar si la acción es "devolver" y el estado actual es 1
        if ($request->input('action') == 'devolver' && $prestamo->estado_devolucion == 1) {
            // Cambiar el estado del préstamo a 2 (devuelto)
            $prestamo->estado_devolucion = 2;
            $prestamo->save();

            // Actualizar el estado del libro
            $libro = $prestamo->libro;
            $libro->estado = $request->input('libro_estado');
            $libro->save();

            // Redirigir de vuelta a la lista de solicitudes con un mensaje de éxito
            return redirect()->route('prestamos.index')->with('success', 'Préstamo devuelto con éxito.');
        }

        // Redirigir de vuelta a la lista de solicitudes sin hacer cambios si no se cumple la condición
        return redirect()->route('prestamos.index')->with('error', 'No se pudo devolver el préstamo.');
    }

    public function generatePdf()
    {
        $prestamos = Prestamos::all(); // Asegúrate de obtener tus préstamos como lo necesites

        $pdf = PDF::loadView('registros.prestadoslibroPDF', compact('prestamos'));

        return $pdf->stream('listado_prestamos.pdf');
    }
    //public function generatePdf()
    //{
        // Obtener todas las solicitudes
        //$prestamos = Prestamos::all();

        // Obtener la fecha actual en el formato deseado (por ejemplo, YYYY-MM-DD)
       // $fecha = date('Y-m-d');

        // Crear el nombre del archivo con la fecha
        //$nombreArchivo = "Reporte_prestamos_FIS-{$fecha}.pdf";

        // Crear el PDF usando una vista (que se creará a continuación)
        //$pdf = Pdf::loadView('registros.prestadoslibroPDF', compact('prestamos'));

        // Descargar el PDF con el nombre específico
        //return $pdf->download($nombreArchivo);
    //}
}
