<?php


namespace App\Livewire;

use App\Models\Estudiante;
use App\Models\Libro;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf; //para generar el pdf
use Livewire\Attributes\Title;
use Livewire\WithPagination;

//Título de la pagina renderizada usando base.blade.php
#[Title('Inventario de libros')]

class InventarioComponent extends Component
{

    use WithPagination;

    public $visibleSidebar;

    public $query = '';

    public $codigo, $titulo, $autor, $anio, $editorial, $edicion, $ejemplar, $estado;
    public $codigo_nuevo, $codigo_borrar;

    public function redirectPrestamos()
    {
        return redirect()->to('/');
    }
    public function redirectPrestados()
    {
        return redirect()->to('/prestamos');
    }
    public function redirectListaEstudiantes()
    {
        return redirect()->to('/administrador/estudiante');
    }
    public function redirectListaLibros()
    {
        return redirect()->to('/administrador/inventario');
    }

    public function mount()
    {
        $this->visibleSidebar = true;
    }

    public function toggleSidebar()
    {
        if ($this->visibleSidebar) {
            $this->visibleSidebar = false;
        } else {
            $this->visibleSidebar = true;
        }
    }

    public function hideSidebar()
    {
        $this->visibleSidebar = false;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'codigo' => 'required|unique:libros',
            'titulo' => 'required',
            'autor' => 'required',
            'anio' => 'required|numeric',
            'editorial' => 'required',
            'edicion' => 'required',
            'ejemplar' => 'required|numeric|min:1',
            'estado' => 'required|boolean',
        ],[ //Mensajes de error
            'codigo.required' => 'El código es obligatorio.',
            'codigo.unique' => 'Este código ya está en uso.',
            'titulo.required' => 'El título es obligatorio.',
            'autor.required' => 'El autor es obligatorio.',
            'anio.required' => 'El año es obligatorio.',
            'anio.numeric' => 'El año debe ser un número.',
            'editorial.required' => 'La editorial es obligatoria.',
            'edicion.required' => 'La edición es obligatoria.',
            'ejemplar.required' => 'El número de ejemplares es obligatorio.',
            'ejemplar.numeric' => 'El número de ejemplares debe ser un número.',
            'ejemplar.min' => 'El número de ejemplares debe ser al menos 1.',
            'estado.required' => 'El estado es obligatorio.',
            'estado.boolean' => 'El estado debe ser verdadero o falso.',
        ]);
    }

    public function search()
    {
        $this->resetPage();
    }

    public function guardarLibroData()
    {
        $this->validate([
            'codigo' => 'required|unique:libros',
            'titulo' => 'required',
            'autor' => 'required',
            'anio' => 'required|numeric',
            'editorial' => 'required',
            'edicion' => 'required',
            'ejemplar' => 'required|numeric|min:1',
            'estado' => 'required|boolean',
        ],[ //Mensajes de error
            'codigo.required' => 'El código es obligatorio.',
            'codigo.unique' => 'Este código ya está en uso.',
            'titulo.required' => 'El título es obligatorio.',
            'autor.required' => 'El autor es obligatorio.',
            'anio.required' => 'El año es obligatorio.',
            'anio.numeric' => 'El año debe ser un número.',
            'editorial.required' => 'La editorial es obligatoria.',
            'edicion.required' => 'La edición es obligatoria.',
            'ejemplar.required' => 'El número de ejemplares es obligatorio.',
            'ejemplar.numeric' => 'El número de ejemplares debe ser un número.',
            'ejemplar.min' => 'El número de ejemplares debe ser al menos 1.',
            'estado.required' => 'El estado es obligatorio.',
            'estado.boolean' => 'El estado debe ser verdadero o falso.',
        ]);

        //crea el libro
        $libro = new Libro();
        $libro->codigo = $this->codigo;
        $libro->titulo = $this->titulo;
        $libro->autor = $this->autor;
        $libro->anio = $this->anio;
        $libro->editorial = $this->editorial;
        $libro->edicion = $this->edicion;
        $libro->ejemplar = $this->ejemplar;
        $libro->estado = $this->estado;

        $libro->save();

        $this->dispatch('cerrarModal');

        session()->flash('message', 'Libro añadido exitosamente!');

        $this->resetInputs();
    }

    public function resetInputs()
    {
        //reinicia el formulario
        $this->codigo = '';
        $this->titulo = '';
        $this->autor = '';
        $this->anio = '';
        $this->editorial = '';
        $this->edicion = '';
        $this->ejemplar = '';
        $this->estado = '1';
        $this->resetErrorBag(); //reinicia los mensajes de error.
    }

    public function editarLibro($id)
    {
        $this->resetInputs();

        $libro = Libro::where('id', $id)->first();

        $this->codigo_nuevo = $libro->id;
        $this->codigo = $libro->codigo;
        $this->titulo = $libro->titulo;
        $this->autor = $libro->autor;
        $this->anio = $libro->anio;
        $this->editorial = $libro->editorial;
        $this->edicion = $libro->edicion;
        $this->ejemplar = $libro->ejemplar;
        $this->estado = $libro->estado;
    }

    public function editarLibroData()
    {
        $this->validate([
            'codigo' => 'required|unique:libros,codigo,' . $this->codigo_nuevo . '',
            'titulo' => 'required',
            'autor' => 'required',
            'anio' => 'required|numeric',
            'editorial' => 'required',
            'edicion' => 'required',
            'ejemplar' => 'required|numeric|min:1',
            'estado' => 'required | boolean',
        ],[ //Mensajes de error
            'codigo.required' => 'El código es obligatorio.',
            'codigo.unique' => 'Este código ya está en uso.',
            'titulo.required' => 'El título es obligatorio.',
            'autor.required' => 'El autor es obligatorio.',
            'anio.required' => 'El año es obligatorio.',
            'anio.numeric' => 'El año debe ser un número.',
            'editorial.required' => 'La editorial es obligatoria.',
            'edicion.required' => 'La edición es obligatoria.',
            'ejemplar.required' => 'El número de ejemplares es obligatorio.',
            'ejemplar.numeric' => 'El número de ejemplares debe ser un número.',
            'ejemplar.min' => 'El número de ejemplares debe ser al menos 1.',
            'estado.required' => 'El estado es obligatorio.',
            'estado.boolean' => 'El estado debe ser verdadero o falso.',
        ]);

        $libro = Libro::where('id', $this->codigo_nuevo)->first();

        $libro->codigo = $this->codigo;
        $libro->titulo = $this->titulo;
        $libro->autor = $this->autor;
        $libro->anio = $this->anio;
        $libro->editorial = $this->editorial;
        $libro->edicion = $this->edicion;
        $libro->ejemplar = $this->ejemplar;
        $libro->estado = $this->estado;

        $libro->save();

        session()->flash('message', 'Libro actualizado exitosamente!');

        $this->resetInputs();

        $this->dispatch('cerrarModal');
    }

    public function confirmacionBorrar($id)
    {

        $this->codigo_borrar = $id;
    }

    public function borrarLibroData()
    {
        $libro = Libro::find($this->codigo_borrar);

        if(!$libro){
            session()->flash('error', 'Libro no encontrado');
            $this->dispatch('cerrarModal');
            return;
        }

        if($libro->solicitudes()->exists()){
            session()->flash('error', 'No se pueden borrar libros con solicitudes registradas');
            $this->dispatch('cerrarModal');
            return;
        }

        try {
            $libro->delete();
            session()->flash('message', 'Estudiante eliminado exitosamente');
        } catch (\Exception $e) {
            session()->flash('error', 'Error al eliminar el estudiante: ' . $e->getMessage());
        }

        $this->dispatch('cerrarModal');
    }

    public function generarPDF()
    {

        $libros = Libro::all();


        $pdf = Pdf::loadView('inventario-pdf', compact('libros'));

        session()->flash('message', 'Se ha generado un PDF');

        $this->dispatch('cerrarModal');

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'Reporte de inventario.pdf');
    }

    public function clearQuery()
    {
        $this->query = '';
    }
    public function render()
    {
        $libros = Libro::where('titulo','like','%'.$this->query.'%')
        ->orWhere('autor','like','%'.$this->query.'%')
        ->orWhere('editorial','like','%'.$this->query.'%')
        ->paginate(20)
        ;

        //return view('livewire.inventario-component', ['libros' => $libros])->layout('livewire.layouts.base');

        return view('livewire.inventario-component', ['libros' => $libros])->layout('livewire.layouts.base');
    }
}
