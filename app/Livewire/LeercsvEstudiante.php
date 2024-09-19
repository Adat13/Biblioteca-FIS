<?php

namespace App\Livewire;

use App\Models\Estudiantes;
use Livewire\WithFileUploads;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class LeercsvEstudiante extends Component
{
    use WithFileUploads;

    public $file;
    public $fileName;
    public $csvData = [];
    public $headers = ['nombre', 'dni', 'codigo'];
    public $originalCsvData = [];
    public $deletedRows = [];

    public function updatedFile()
    {
        $this->fileName = $this->file->getClientOriginalName();
    }

    public function restaurar()
    {
        $this->reset('file', 'csvData', 'originalCsvData', 'deletedRows','fileName');
    }
    public function uploadFile()
    {
        $this->validate([
            'file' => 'required|mimes:csv,txt|max:2048',
        ]);

        $path = $this->file->getRealPath();
        $csv = array_map(function ($line) {
            return str_getcsv($line, ';');
        }, file($path));

        // Eliminar BOM
        $csv[0][0] = preg_replace('/\x{FEFF}/u', '', $csv[0][0]);

        // Verificar si el archivo CSV tiene las cabeceras correctas
        $fileHeaders = $csv[0];
        if ($fileHeaders !== $this->headers) {
            session()->flash('error', 'Las cabeceras del archivo CSV no son correctas.');
            $this->reset('file', 'csvData', 'originalCsvData', 'fileName');
            return;
        }

        // Remover la fila de cabeceras
        array_shift($csv);

        // Validar cada fila de datos
        foreach ($csv as $row) {
            $row = array_combine($this->headers, $row);

            $validator = Validator::make($row, [
                'nombre' => 'required|string',
                'dni' => 'required|integer',
                'codigo' => 'required|string',
            ]);

            if ($validator->fails()) {
                session()->flash('error', 'Error en la fila: ' . json_encode($row) . ' - ' . $validator->errors()->first());
                $this->reset('file', 'csvData', 'originalCsvData', 'fileName');
                return;
            }

            $this->csvData[] = $row;
        }

        $this->originalCsvData = $this->csvData;
        session()->flash('message', 'Archivo cargado exitosamente. Puedes modificar los datos antes de guardar.');
    }

    public function updateCsvData($index, $field, $value)
    {
        $this->csvData[$index][$field] = $value;
    }

    public function saveChanges()
    {
        session()->flash('message', 'Cambios guardados. Puedes seguir editando o guardar los datos en la base de datos.');
    }

    public function discardChanges()
    {
        $this->csvData = $this->originalCsvData;
        $this->deletedRows = [];
        session()->flash('message', 'Cambios descartados. Los datos han sido restaurados a su estado original.');
    }

    public function markRowAsDeleted($index)
    {
        $this->deletedRows[$index] = true;
    }

    public function restoreRow($index)
    {
        unset($this->deletedRows[$index]);
    }

    public function save()
    {
        if ($this->csvData == null) {
            $this->dispatch('cerrarModal');
            session()->flash('error', 'No se ha subido ningun archivo');
            return;
        }

        foreach ($this->csvData as $index => $row) {
            if (isset($this->deletedRows[$index])) {
                continue; // Skip deleted rows
            }

            if ($this->isDuplicate($row['codigo'])) {
                session()->flash('error', 'Registro duplicado encontrado: ' . $row['codigo']);
                continue;
            }

            try {
                $estudiante = new Estudiantes();
                $estudiante->nombre = $row['nombre'];
                $estudiante->dni = $row['dni'];
                $estudiante->codigo = $row['codigo'];
                $estudiante->save();
            } catch (\Exception $e) {
                session()->flash('error', 'Error al guardar el registro con código: ' . $row['codigo'] . ' - ' . $e->getMessage());
                continue;
            }
        }

        $this->reset('file', 'csvData', 'originalCsvData', 'deletedRows','fileName');
        session()->flash('message', 'Datos guardados exitosamente en la base de datos.');
        $this->dispatch('cerrarModal');
    }

    public function isDuplicate($codigo)
    {
        return Estudiantes::where('codigo', $codigo)->exists();
    }

    public function render()
    {
        return view('livewire.leercsv-estudiante');
    }
}
