<?php

namespace App\Livewire;

use App\Models\Estudiantes;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[title('Lista de Estudiantes')]

class ListaEstudiante extends Component
{
    use WithPagination;
    public $query;
    public $nombre, $dni, $codigo, $codigo_nuevo, $codigo_borrar;
    public $visibleSidebar;
    public function redirectPrestados()
    {
        return redirect()->to('/prestamos');
    }
    public function redirectListaLibros()
    {
        return redirect()->to('/administrador/inventario');
    }
    public function redicretListaestudiantes()
    {
        return redirect()->to('/administrador/estudiante');
    }
    public function redirectSolicitudesLista()
    {
        return redirect()->to('/solicitudes');
    }
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'nombre' => 'required',
            'dni' => 'required|numeric',
            'codigo' => 'required|unique:estudiantes',
        ]);
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

    public function search()
    {
        $this->resetPage();
    }

    public function hideSidebar()
    {
        $this->visibleSidebar = false;
    }

    public function resetInputs()
    {
        $this->nombre = '';
        $this->dni = '';
        $this->codigo = '';

        $this->resetErrorBag();
    }

    public function editarEstudiante($id)
    {
        $this->resetInputs();

        $estudiante = Estudiantes::where('id', $id)->first();
        $this->codigo_nuevo = $estudiante->id;
        $this->nombre = $estudiante->nombre;
        $this->dni = $estudiante->dni;
        $this->codigo = $estudiante->codigo;
    }

    function editarEstudianteData()
    {
        $this->validate([
            'nombre' => 'required',
            'dni' => 'required|numeric',
            'codigo' => 'required|unique:estudiantes,codigo,' . $this->codigo_nuevo . '',
        ]);

        $estudiante = Estudiantes::where('id', $this->codigo_nuevo)->first();

        $estudiante->nombre = $this->nombre;
        $estudiante->dni = $this->dni;
        $estudiante->codigo = $this->codigo;

        $estudiante->save();

        session()->flash('message', 'Estudiante actualizado exitosamente');

        $this->resetInputs();

        $this->dispatch('cerrarModal');
    }

    public function confirmacionBorrar($id)
    {
        $this->codigo_borrar = $id;
    }

    public function borrarEstudianteData()
    {
        $estudiante = Estudiantes::find($this->codigo_borrar);

        if (!$estudiante) {
            session()->flash('error', 'Estudiante no encontrado');
            $this->dispatch('cerrarModal');
            return;
        }

        // Comprobar si el estudiante tiene solicitudes asociadas
        if ($estudiante->solicitudes()->exists()) {
            session()->flash('error', 'No se pueden borrar estudiantes con solicitudes registradas');
            $this->dispatch('cerrarModal');
            return;
        }

        try {
            $estudiante->delete();
            session()->flash('message', 'Estudiante eliminado exitosamente');
        } catch (\Exception $e) {
            session()->flash('error', 'Error al eliminar el estudiante: ' . $e->getMessage());
        }

        $this->dispatch('cerrarModal');
    }

    public function guardarEstudianteData()
    {
        $this->validate([
            'nombre' => 'required',
            'dni' => 'required|numeric',
            'codigo' => 'required|unique:estudiantes',
        ]);

        $estudiante = new Estudiantes();
        $estudiante->nombre = $this->nombre;
        $estudiante->dni = $this->dni;
        $estudiante->codigo = $this->codigo;

        $estudiante->save();

        $this->dispatch('cerrarModal');

        session()->flash('message', 'Estudiante registrado correctamente');

        $this->resetInputs();
    }

    public function clearQuery()
    {
        $this->query = '';
    }
    public function render()
    {
        $estudiantes = Estudiantes::where('nombre', 'like', '%' . $this->query . '%')
            ->orWhere('codigo', 'like', '%' . $this->query . '%')
            ->orWhere('dni', 'like', '%' . $this->query . '%')
            ->orderBy('id', 'desc')
            ->paginate(20);

        return view('livewire.lista-estudiante', ['estudiantes' => $estudiantes])
            ->layout('livewire.layouts.base');
    }
}
