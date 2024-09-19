<?php

namespace App\Http\Controllers;

use App\Models\Estudiantes;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function index(Request $request)
    {
        // Obtener parámetros de búsqueda del request
        $search = $request->input('search');

        // Consulta inicial de todos los estudiantes con posibles filtros aplicados
        $estudiantesQuery = Estudiantes::query();

        if ($search) {
            $estudiantesQuery->where(function ($query) use ($search) {
                $query->where('nombre', 'like', "%{$search}%")
                      ->orWhere('dni', 'like', "%{$search}%")
                      ->orWhere('codigo', 'like', "%{$search}%");
            });
        }

        // Aplicar paginación después de los filtros
        $estudiantes = $estudiantesQuery->paginate(10);

        // Mantener los parámetros de búsqueda en la paginación
        $estudiantes->appends($request->all());

        // Devolver la vista con los resultados paginados y los parámetros de búsqueda
        return view('estudiantes.index', compact('estudiantes'));
    }

    public function create()
    {
        return view('estudiantes.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'dni' => 'required|unique:estudiantes,dni',
            'codigo' => 'required|unique:estudiantes,codigo',
        ]);

        Estudiantes::create($validatedData);

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante creado exitosamente');
    }

    public function show(Estudiantes $estudiante)
    {
        return view('estudiantes.show', compact('estudiante'));
    }

    public function edit(Estudiantes $estudiante)
    {
        return view('estudiantes.edit', compact('estudiante'));
    }

    public function update(Request $request, Estudiantes $estudiante)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'dni' => 'required|unique:estudiantes,dni,' . $estudiante->id,
            'codigo' => 'required|unique:estudiantes,codigo,' . $estudiante->id,
        ]);

        $estudiante->update($validatedData);

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante actualizado exitosamente');
    }

    public function destroy(Estudiantes $estudiante)
    {
        $estudiante->delete();

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante eliminado exitosamente');
    }
}
