<div>
    <div id="mySidebar" class="sidebar">
        <div style="display: flex; align-items: center; padding-top: 0; margin-top: 20px;">
            <a href="#" style="margin-left: 10px;">
                <img src="https://i0.wp.com/sistemasuncp.edu.pe/wp-content/uploads/2023/07/Logo-fis-300x300-1.png?w=300&ssl=1 300w, https://i0.wp.com/sistemasuncp.edu.pe/wp-content/uploads/2023/07/Logo-fis-300x300-1.png?resize=150%2C150&ssl=1 150w"
                    alt="Tu Imagen" style="vertical-align: middle; width: 50px; height: 50px;" />
            </a>
            <span style="margin-left: 0;">BIBLIOTECA FIS</span>
            <a href="#" style="margin-left: 10px;" onclick="toggleNav()">
                <img src="https://cdn.icon-icons.com/icons2/1129/PNG/512/menuthreelinesbuttoninterfacesymbol_79952.png"
                    alt="Cerrar Sidebar"
                    style="vertical-align: middle; width: 20px; height: 30px; filter: invert(1) brightness(2);" />
            </a>

        </div>
        <div class="sub-header mb-4 ml-4">
            <img src="{{ asset('imagenes/admin2-SinFondo.png') }}" alt="Logo administrador" class="admin-logo">
            <p>Administrador</p>
        </div>
        <a href="{{ route('solicitudes.index') }}">>Préstamo solicitado</a>
        <a href="{{ route('prestamos.index') }}">>Libros prestados</a>
        <a href="{{ route('administrador.estudiante') }}">>Estudiantes</a>
        <a href="{{ route('administrador.inventario') }}">>Libros</a>
        @auth
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">>Cerrar
                Sesión</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endauth
    </div>

    <style>
        body {
            background-color: #082368;
            /* Fondo de color azul */
            display: flex;
            flex-direction: column;
            min-height: 100vh;

            background-image: url('{{ asset('imagenes/fondo.png') }}');
            /* Ruta a la primera imagen de fondo */
            background-position: top left;
            /* Posición de la imagen en la parte izquierda superior */
            background-repeat: no-repeat;
            /* No repetir la imagen de fondo */
            background-attachment: fixed;
            /* Fijar la imagen de fondo */
            background-size: 30%;
            /* Tamaño de la imagen de fondo, cubrir completamente */
        }

        .footer {
            background-image: url('{{ asset('imagenes/fondo.png') }}');
            /* Ruta a la primera imagen de fondo */
            background-position: bottom right;
            /* Posición de la imagen en la parte izquierda superior */
            background-repeat: no-repeat;
            /* No repetir la imagen de fondo */
            background-attachment: fixed;
            /* Fijar la imagen de fondo */
            background-size: 30%;
        }

        .navbar {
            background-color: #ffffff;
            /* Color blanco para navbar y footer */
            color: #000000;
            border-radius: 10px;
            /* Bordes redondeados */
            margin: 20px auto;
            /* Separación de los bordes y centrado */
            padding: 10px 20px;
            width: 97%;
            height: 140px;
        }

        .navbar-brand img {
            width: 400px;
            /* Tamaño más grande para el logo */
            height: auto;
            padding: -2px 15px;
            border: none;
            position: absolute;
            left: 85px;
            /* Alineado a la izquierda */
            top: 20px;
        }

        .navbar-nav {
            flex-direction: row;
            align-items: center;
            justify-content: center;
            width: 100%;
        }

        .navbar-title {
            font-size: 2.5rem;
            font-weight: bold;
            margin: 0 15px;
            text-align: center;
            color: white;
        }

        .navbar-collapse {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .nav-item {
            margin-left: 15px;
            margin-right: 15px;
        }

        .container {
            margin-top: 30px;
            flex: 1;
        }

        .table-buttons .btn {
            margin-left: 5px;
            margin-right: 5px;
            display: inline-block;
        }

        .table th,
        .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table {
            background-color: #ffffff;
            border-radius: 10px;
            /* Bordes redondeados */
            overflow: hidden;
            width: 94%;
            margin: auto;
            border-collapse: collapse;
            /* Elimina las líneas verticales */
        }

        .table thead th {
            background-color: #ffffff;
            color: black;
        }

        .table tbody tr {
            border-bottom: 1px solid #ddd;
            /* Solo líneas horizontales */
        }

        .fade-in {
            animation: fadeIn 2s;
        }

        .footer {
            padding: 1rem;
            width: 100%;
            /* Asegura que el footer tenga el ancho completo */
            position: relative;
            bottom: 0;
        }

        .dropdown-menu {
            left: 0;
            right: auto;
            background-color: rgba(0, 0, 0, 0.5);
            /* Fondo transparente */
        }

        input.form-control {
            margin-left: 0;
        }

        .btn-secondary {
            color: #fff;
            background-color: #0088ff;
            border-color: #57b1ff;
            margin-left: 3%;
        }

        td.table-buttons {
            width: 10%;
        }

        .sidebar {

            width: 250px;
            height: 100%;
            position: fixed;
            top: 0;
            left: -250px;
            background-color: rgba(3, 38, 49, 0.83);
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
            z-index: 2;
            border-top-right-radius: 14px;
            border-bottom-right-radius: 14px;
            opacity: 0;
            color: white;

        }

        .sidebar-visible {
            left: 0;
            opacity: 1;
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 25px;
            color: white;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: rgba(255, 255, 255, 0.2);
            /* Fondo más brillante en hover */
        }

        .openbtn {
            font-size: 40px;
            cursor: pointer;
            background-color: #ffffff;
            color: rgb(0, 0, 0);
            padding: 5px 15px;
            border: none;
            position: absolute;
            left: 10px;
            top: 20px;
            z-index: 1;
        }

        .openbtn:hover {
            filter: brightness(0.95)
        }

        .openbtn {
            transition: filter 0.3s ease;
        }
    </style>

    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="navbar-collapse">
            <ul class="navbar-nav">
                <button class="openbtn" onclick="toggleNav()">☰</button>
                <li class="nav-item">
                    <a class="navbar-brand" href="#">
                        <img class="card-img-top" src="{{ asset('imagenes/LOGO_Uncp.jpg') }}" alt="Sin imagen">
                    </a>
                </li>
            </ul>

            <!-- Logo con texto "Administrador" a la derecha -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    @auth
                        <a class="nav-link" href="#">
                            <h4>Bienvenido, {{ strtok(Auth::user()->name, ' ') }}</h4>
                            <img src="{{ asset('imagenes/admin2.png') }}" alt="Logo Administrador"
                                style="height: 67px; margin-right: 50px;">
                        </a>
                    @else
                        <a class="nav-link" href="{{ route('login') }}">
                            <h4>Bienvenido Administrador</h4>
                            <img src="{{ asset('imagenes/admin2.png') }}" alt="Logo Administrador"
                                style="height: 67px; margin-right: 50px;">
                        </a>
                    @endauth
                </li>
            </ul>
        </div>
    </nav>
    <li class="nav-item">
        <div class="navbar-title">Lista de Estudiantes</div>
    </li>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <!--h5 class="mb-0"><strong>Inventario de Libros</strong></h5-->
                        <div class="d-flex align-items-center ml-auto ">
                            <button class="image-button-2" data-toggle="modal" data-target="#addLibroModal"
                                wire:click='resetInputs()'>
                                <img class="img-btn" src="{{ asset('imagenes/addstudent.svg') }}" alt="button image">
                            </button>
                            <button class="image-button-2" data-toggle="modal" data-target="#estudianteCsv">
                                <img class="img-btn" src="{{ asset('imagenes/csvicon.svg') }}" alt="button image">
                            </button>
                        </div>

                        <style>
                            /* Estilo del botón de sidebar */
                            .sidebarToggle {
                                background: none;
                                border: none;
                                padding: 0;
                            }

                            .sidebarToggle img {
                                width: 45px;
                                height: 45px;
                            }

                            /* Estilo del sidebar */
                            /* Estilo del boton de pdf*/

                            .image-button img,
                            .image-button-2 img {
                                transition: filter 0.3s ease;

                            }

                            .image-button img:hover {
                                filter: brightness(1.5);
                            }

                            .image-button-2 img:hover {
                                filter: brightness(1.5);
                            }

                            .image-button-2 {
                                background: none;
                                border: none;
                                padding: 0;
                            }

                            .image-button-2 img {
                                width: 90px;
                                height: 80px;
                                cursor: pointer;
                            }

                            .image-button {
                                background: none;
                                border: none;
                                padding: 0;
                            }

                            .image-button img {
                                width: 50px;
                                height: 72px;
                                cursor: pointer;
                            }

                            .d-flex {
                                display: flex;
                            }

                            .justify-content-between {
                                justify-content: space-between;
                            }

                            .align-items-center {
                                align-items: center;
                            }

                            .mr-2 {
                                margin-right: 0.5rem;
                                /* Ajusta el espacio entre los botones según sea necesario */
                            }
                        </style>
                    </div>
                    <div class="paginacion">
                        {{ $estudiantes->links() }}
                    </div>
                    <div class="buscador">
                        <form class="form-inline" wire:submit.prevent="search">
                            <div class="form-group mb-2">
                                <input class="form-control mr-2" type="text" wire:model="query"
                                    placeholder="Buscar estudiante">
                            </div>
                            <button class="btn btn-sm btn-primary mb-2" type="submit">Buscar</button>
                            <button class="btn btn-sm btn-primary mb-2 ml-2" type="button"
                                wire:click='clearQuery'>Limpiar</button>
                        </form>
                    </div>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success text-center">{{ session('message') }}</div>
                        @elseif(session()->has('error'))
                            <div class="alert alert-error text-center">{{ session('error') }}</div>
                        @endif
                        <style>
                            .alert-error {
                                color: #571515;
                                background-color: #edd4d4;
                                border-color: #e6c3c3;
                                border-radius: 10px;
                            }
                        </style>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table.bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>DNI</th>
                    <th>Código</th>
                    <th style="text-align: center">Acción</th>
                </tr>
            </thead>
            <tbody>
                @if ($estudiantes->count() > 0)
                    @foreach ($estudiantes as $estudiante)
                        <tr wire:key='{{ $estudiante->id }}'>
                            <td>{{ $estudiante->nombre }}</td>
                            <td>{{ $estudiante->dni }}</td>
                            <td>{{ $estudiante->codigo }}</td>
                            <td style="text-align: center">
                                <button class="btn-editar" data-toggle="modal" data-target="#editarLibroModal"
                                    wire:click='editarEstudiante({{ $estudiante->id }})'>
                                    <img src="{{ asset('imagenes/EditarLibro.png') }}" alt="button image">
                                </button>
                                <button class="btn-borrar" data-toggle="modal" data-target="#borrarLibroModal"
                                    wire:click='confirmacionBorrar({{ $estudiante->id }})'>
                                    <img src="{{ asset('imagenes/borrarLibro.png') }}" alt="button image">
                                </button>
                            </td>

                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colpan="4" style="text-align: center"><small>No hay estudiantes
                                registrados</small></td>
                    </tr>
                @endif
            </tbody>
        </table>
        <footer class="footer mt-auto py-3 text-center fade-in">
            <div class="container">
                <span class="text-muted">© 2024 Universidad Nacional del Centro del Perú - Facultad de Ingeniería de
                    Sistemas</span>
            </div>
        </footer>
    </div>


    <style>
        /* Estilo de la páginación */
        .form-inline {
            font-family: "Itim", cursive;
            font-size: 16px;
        }

        /* Estilo de los botones editar y borrar*/
        .btn-editar {
            background: none;
            border: none;
            padding: 0;
        }

        .btn-editar img {
            width: 40px;
            height: 40px;
        }

        .btn-borrar {
            background: none;
            border: none;
            padding: 0;
        }

        .btn-borrar img {
            width: 40px;
            height: 40px;
        }

        .btn-editar img,
        .btn-borrar img {
            transition: filter 0.3s ease;
        }

        .btn-editar img:hover {
            filter: brightness(0.5);
        }

        .btn-borrar img:hover {
            filter: brightness(1.5);
        }

        /* Estilo del contenedor de la tabla */
        .container {
            max-width: 95%;
        }

        /* Estilo de los contenedores de los botones pdf y nuevo libro */

        .card,
        .card-header {
            box-shadow: transparent;
            border-color: transparent;
            background-color: transparent;
        }

        /* Estilo de la barra de navegación superior */
        .navbar-nav .nav-link {
            display: flex;
            align-items: center;
            color: #ffffff;
            position: absolute;
            right: 20px;
            top: 30px
        }

        .navbar-title {
            font-family: "itim", cursive;
        }

        .navbar {
            background-color: #ffffff;
            /* Color blanco para navbar y footer */
            color: #000000;
            border-radius: 10px;
            /* Bordes redondeados */
            margin: 20px auto;
            /* Separación de los bordes y centrado */
            padding: 10px 20px;
            width: 97%;
            height: 140px;
        }

        .navbar-brand img {
            width: 400px;
            /* Tamaño más grande para el logo */
            height: auto;
            padding: -2px 15px;
            border: none;
            position: absolute;
            left: 85px;
            /* Alineado a la izquierda */
            top: 20px;
        }

        .navbar-nav {
            flex-direction: row;
            align-items: center;
            justify-content: center;
            width: 100%;
        }

        .navbar-title {
            font-size: 2.5rem;
            font-weight: bold;
            margin: 0 15px;
            text-align: center;
            color: white;
        }

        .navbar-collapse {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .nav-item {
            margin-left: 15px;
            margin-right: 15px;
        }

        /* Estilo de la tabla */
        .table {
            font-family: 'Itim', cursive;
            background-color: #ffffff;
            border-radius: 10px;
            /* Bordes redondeados */
            overflow: hidden;
            width: 100%;
            margin: auto;
            border-collapse: collapse;
            /* Elimina las líneas verticales */
        }

        .table thead th {
            background-color: #ffffff;
            color: black;
        }

        .table tbody tr {
            border-bottom: 1px solid #ddd;
            /* Solo líneas horizontales */
        }

        /* Estilo para el fondo del modal, que sea transparente*/

        .modal {
            align-content: center;
        }
        .modal.fade .modal-dialog {
            transition: transform .3s ease-out;
            margin: 10px auto;
        }

        .modal-content {
            background-color: transparent;
            /* Fondo transparente */
            border: none;
            box-shadow: none;
        }

        .modal-header,
        .modal-body,
        .modal-footer {
            background-color: white;
            /* Fondo blanco para el contenido */
            border-radius: 10px;
        }

        .modal-header {
            border-bottom: none;
        }

        .modal-footer {
            border-top: none;
        }

        /* Estilo para el encabezado del modal */
        .modal-header {
            background-color: #082368;

            text-align: center;
            justify-content: center;
            border-radius: 15px;
        }

        .modal-header h5 {
            font-family: 'Itim', cursive;
            font-size: 2.5rem;
            margin: auto;
            color: white;
        }

        /* Estilo para el cuerpo del modal */
        .modal-body {
            background: #1C45AF;
            border-radius: 15px;
            padding: 20px;
            /* Añade un poco de relleno para el contenido */
            overflow: hidden;
            /* Oculta cualquier contenido que se salga del contenedor */
            color: #ffffff
        }

        /* Estilo para el formulario */
        .form-group {
            font-size: 15px;
            /* Tamaño de la letra */
            border-radius: 5px;
            /* Redondez del borde */
            margin-bottom: 5px;
            /* Reducir margen inferior */
            font-family: 'Itim', cursive;
            font-weight: bold;
        }

        .col-md-8 {
            display: flex;
            justify-content: center;

        }

        .form-group input {
            width: 250px;
            /* Hacer que el input ocupe todo el ancho del contenedor */
            height: 30px;
            margin-bottom: 0;
            /* Eliminar margen inferior */

        }

        .form-control {
            width: 100%;
            height: auto;
            font-size: 15px;
            border-radius: 5px;
        }

        /* Estilo para los botones */
        .form-group button {
            font-size: 15px;
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: bold;
            border: none;
            color: white;
            cursor: pointer;
        }

        .btn-secondary {
            background-color: #f44336;
        }

        button[type="submit"] {
            background-color: #4CAF50;
        }

        /* Estilo para las imágenes */
        .image {
            background: #D9D9D9;
            border-radius: 30px;
            width: 170px;

            display: flex;
            justify-content: center;
            padding: 20px;

        }

        .col-md-8 {
            display: flex;
            justify-content: center;

        }

        .imagenes {
            max-width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-left: -25px;
        }

        /* Estilo del footer */
        .footer {
            padding: 1rem;
            width: 100%;
            position: relative;
            bottom: 0;
        }
    </style>

    @livewire('leercsvEstudiante')

    <!-- Modal Añadir nuevo libro-->
    <div wire:ignore.self class="modal fade" id="addLibroModal" tabindex="-1" role="dialog"
        aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <img src="{{ asset('imagenes/Admin_.png') }}" alt="Admin" title="Administrador"
                        width="180px" />
                    <h5 class="modal-title">Añadir Nuevo Estudiante</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <form wire:submit.prevent='guardarEstudianteData' id="addLibroForm">
                                <div class="form-group">
                                    <input type="text" id="nombre" class="form-control"
                                        wire:model.change="nombre" placeholder="nombre">
                                    @error('nombre')
                                        <span class="text-danger" style="font-size: 11px;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="number" id="dni" class="form-control" wire:model="dni"
                                        placeholder="dni">
                                    @error('dni')
                                        <span class="text-danger" style="font-size: 11px;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" id="codigo" class="form-control" wire:model="codigo"
                                        placeholder="codigo">
                                    @error('codigo')
                                        <span class="text-danger" style="font-size: 11px;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group text-center mt-4">
                                    <button type="submit" class="btn btn-sm btn-primary">Añadir</button>
                                    <button type="button" class="btn btn-sm btn-secondary"
                                        data-dismiss="modal">Cerrar</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <div class="imagenes d-flex align-items-center justify-content-center">
                                <div class="image">
                                    <img src="{{ asset('imagenes/estudiante_logo.jpeg') }}" alt="Libro"
                                        title="Libros" width="150px" />
                                </div>
                                <img src="{{ asset('imagenes/Flecha.png') }}" alt="Flecha" title="Subir datos"
                                    width="75px" />

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Modificar libro-->
    <div wire:ignore.self class="modal fade" id="editarLibroModal" tabindex="-1" role="dialog"
        aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="{{ asset('imagenes/Admin_.png') }}" alt="Admin" title="Administrador"
                        width="180px" />
                    <h5 class="modal-title">Editar Estudiante</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <form wire:submit.prevent='editarEstudianteData'>
                                <div class="form-group">


                                    <input type="text" id="nombre" class="form-control"
                                        wire:model.change="nombre">
                                    @error('nombre')
                                        <span class="text-danger" style="font-size: 11px;">{{ $message }}</span>
                                    @enderror


                                </div>
                                <div class="form-group">


                                    <input type="number" id="dni" class="form-control" wire:model="dni">
                                    @error('dni')
                                        <span class="text-danger" style="font-size: 11px;">{{ $message }}</span>
                                    @enderror


                                </div>
                                <div class="form-group">


                                    <input type="text" id="codigo" class="form-control" wire:model="codigo">
                                    @error('codigo')
                                        <span class="text-danger" style="font-size: 11px;">{{ $message }}</span>
                                    @enderror


                                </div>

                                <div class="form-group text-center mt-4">

                                    <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                                    <button type="button" class="btn btn-sm btn-secondary"
                                        data-dismiss="modal">Cerrar</button>


                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <div class="imagenes d-flex align-items-center justify-content-center">
                                <div class="image">
                                    <img src="{{ asset('imagenes/EditarLibro.png') }}" alt="Libro" title="Libros"
                                        width="120px" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal eliminar libro -->
    <div wire:ignore.self class="modal fade" id="borrarLibroModal" tabindex="-1" role="dialog"
        aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmar Eliminación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-4 pb-4">
                    <h6>¿Está seguro que quiere eliminar el estudiante?</h6>
                    <div class="d-flex justify-content-end mt-4">
                        <button class="btn btn-sm btn-primary mr-2" data-dismiss="modal">No, cancelar</button>
                        <button class="btn btn-sm btn-danger" wire:click='borrarEstudianteData'>Sí, Eliminar
                            estudiante</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <!-- Script para manejar el formulario del modal -->
    <script>
        /* Animación y lógica del sidebar */

        function toggleNav() {
            const sidebar = document.getElementById("mySidebar");
            sidebar.classList.toggle('sidebar-visible');
        }

        // Event listener para cerrar el sidebar al hacer clic fuera de él
        document.addEventListener("click", function(event) {
            const sidebar = document.getElementById("mySidebar");
            const openButton = document.querySelector(".openbtn");

            // Verificar si el clic fue fuera del sidebar y no en el botón de abrir/cerrar
            if (sidebar.classList.contains('sidebar-visible') &&
                !sidebar.contains(event.target) &&
                event.target !== openButton &&
                !openButton.contains(event.target)) {
                sidebar.classList.remove('sidebar-visible');
            }
        });

        // Prevenir el cierre inmediato cuando se hace clic en el botón de abrir/cerrar
        document.querySelector(".openbtn").addEventListener("click", function(event) {
            event.stopPropagation();
        });

        document.querySelector(".sidebar").addEventListener("click", function(event) {
            event.stopPropagation();
        });

        /* Script para la animación de descargar pdf */
        let dotCount = 1;
        let dotElement = document.getElementById('dots');

        function updateDots() {
            if (dotCount === 1) {
                dotElement.textContent = '.';
                dotCount = 2;
            } else if (dotCount === 2) {
                dotElement.textContent = '..';
                dotCount = 3;
            } else {
                dotElement.textContent = '...';
                dotCount = 1;
            }
        }

        let dotInterval = setInterval(updateDots, 500); // Cambia los puntos cada 500ms
        /* listener para la sidebar */
        document.addEventListener('click', function(event) {
            var sidebar = document.getElementById('mySidebar');
            var isClickInside = sidebar.contains(event.target);

            if (!isClickInside) {
                // Llama al método de Livewire para ocultar el sidebar
                @this.call('hideSidebar');
            }
        });

        window.addEventListener('cerrarModal', event => {
            $('#editarLibroModal').modal('hide');
            $('#addLibroModal').modal('hide');
            $('#borrarLibroModal').modal('hide');
            $('#generandopdfModal').modal('hide');
            $('#estudianteCsv').modal('hide');
        })
    </script>
@endpush
