<div>
    <!-- Modal para leer y mostrar el CSV -->
    <div wire:ignore.self class="modal fade" id="estudianteCsv" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document"
            style="display: flex; max-width: 90%; width: auto;">
            <div class="modal-content" style="max-height: 97vh; overflow-y: auto;">
                <div class="modal-header">
                    <h5 class="modal-title">Subir estudiantes mediante .CSV</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        @if (session()->has('error'))
                            <div class="alert alert-danger text-center">{{ session('error') }}</div>
                        @elseif(session()->has('message'))
                            <div class="alert alert-success text-center">{{ session('message') }}</div>
                        @endif
                    </div>
                    <div>
                        <table class="table table-bordered mt-2">
                            <h5>Las cabeceras deben tener la siguiente estructura:</h5>
                            <thead>
                                <th>nombre</th>
                                <th>dni</th>
                                <th>codigo</th>
                            </thead>
                        </table>
                    </div>
                    <!-- Formulario para cargar el archivo CSV -->
                    <div class="input-group mb-1 mt-1">
                        <div class="custom-file">
                            <input type="file" wire:model="file" class="custom-file-input" id="inputGroupFile">
                            <label class="custom-file-label" for="inputGroupFile">
                                {{ $fileName ?? 'Seleccionar archivo' }}
                            </label>
                        </div>
                        <div class="input-group-append">
                            <button type="button" wire:click="uploadFile" class="btn btn-primary" {{ !$file ? 'disabled' : '' }}>Subir</button>
                        </div>
                    </div>

                    @error('file')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    @if ($csvData)
                        <div>
                            <h3>Datos a importar:</h3>
                        </div>
                        <div class="table-responsive" style="max-height: 50vh; overflow-y: auto;">
                            <table class="table table-bordered mt-1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        @foreach ($headers as $header)
                                            <th>{{ $header }}</th>
                                        @endforeach
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($csvData as $index => $row)
                                        <tr class="{{ isset($deletedRows[$index]) ? 'table-danger' : '' }}">
                                            <td>{{ $loop->index + 1 }}</td>
                                            @foreach ($headers as $header)
                                                <td>
                                                    <input type="text"
                                                        wire:model.lazy="csvData.{{ $index }}.{{ $header }}"
                                                        wire:change="updateCsvData({{ $index }}, '{{ $header }}', $event.target.value)"
                                                        class="form-control"
                                                        {{ isset($deletedRows[$index]) ? 'disabled' : '' }}>
                                                </td>
                                            @endforeach
                                            <td>
                                                @if (!isset($deletedRows[$index]))
                                                    <button type="button"
                                                        wire:click="markRowAsDeleted({{ $index }})"
                                                        class="btn btn-danger btn-sm">
                                                        Eliminar
                                                    </button>
                                                @else
                                                    <button type="button" wire:click="restoreRow({{ $index }})"
                                                        class="btn btn-success btn-sm">
                                                        Restaurar
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    @if ($csvData)
                        <button type="button" wire:click="saveChanges" class="btn btn-success">Guardar Cambios</button>
                        <button type="button" wire:click="discardChanges" class="btn btn-warning">Descartar
                            Cambios</button>
                        <button type="button" wire:click="save" class="btn btn-primary">Guardar en Base de
                            Datos</button>
                    @endif
                    <button type="button"  wire:click='restaurar' class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
