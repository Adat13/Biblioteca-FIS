<?php

namespace App\Http\Controllers;
use App\Models\Libro;
use Illuminate\Http\Request;

class catalogoLibroController extends Controller
{
    public function index(Request $request)
{
    // Obtener parámetros de búsqueda y categoría del request
    $search = $request->input('search');
    $category = $request->input('category');

    // Consulta inicial de todos los libros con posibles filtros aplicados
    $librosQuery = Libro::query();

    if ($search) {
        $librosQuery->where(function ($query) use ($search) {
            $query->where('titulo', 'like', "%{$search}%")
                  ->orWhere('autor', 'like', "%{$search}%")
                  ->orWhere('editorial', 'like', "%{$search}%")
                  ->orWhere('codigo', 'like', "%{$search}%")
                  ->orWhere('ejemplar', 'like', "%{$search}%");
        });
    }

    if ($category) {
        $librosQuery->where('codigo', 'like', "{$category}%");
    }

    // Aplicar paginación después de los filtros
    $libros = $librosQuery->paginate(10);

    // Mantener los parámetros de búsqueda en la paginación
    $libros->appends($request->all());

    // Devolver la vista con los resultados paginados y los parámetros de búsqueda
    return view('catalogoLibro.index', compact('libros'));
}



    public function create()
    {
        return view('libros.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'anio' => 'required|integer',
            'editorial' => 'nullable',
            'edicion' => 'nullable|integer',
            'codigo' => 'nullable',
            'ejemplar' => 'nullable|integer',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            $image = $request->file('imagen');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'), $imageName);
            $validatedData['imagen'] = 'images/'.$imageName;
        }

        Libro::create($validatedData);

        return redirect()->route('libros.index')->with('success', 'Libro creado exitosamente');
    }

    public function show(Libro $libro)
    {
        return view('libros.show', compact('libro'));
    }

    public function edit(Libro $libro)
    {
        return view('libros.edit', compact('libro'));
    }

    public function update(Request $request, Libro $libro)
    {
        $validatedData = $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'anio_publicacion' => 'required|integer',
            'editorial' => 'nullable',
            'edicion' => 'nullable|integer',
            'codigo' => 'nullable',
            'ejemplar' => 'nullable|integer',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            $image = $request->file('imagen');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'), $imageName);
            $validatedData['imagen'] = 'images/'.$imageName;
        }

        $libro->update($validatedData);

        return redirect()->route('libros.index')->with('success', 'Libro actualizado exitosamente');
    }

    public function destroy(Libro $libro)
    {
        $libro->delete();

        return redirect()->route('libros.index')->with('success', 'Libro eliminado exitosamente');
    }
}
