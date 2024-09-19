<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BIBLIOTECA FIS | Libros Prestados</title>

    {{-- bootstrap style --}}
    <!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background: #082368;
        }
    </style>
    <style>
        .pdf-button-container {
            display: flex;
            align-items: center;
            /* Centra verticalmente */
            margin-left: 937px;
            /* Espacio a la izquierda del botón */
        }

        .pdf-button-container .pdf-button {
            border-radius: 8px;
            /* Esquinas redondeadas del botón */
            overflow: hidden;
            /* Para asegurarse de que las esquinas redondeadas se apliquen correctamente */
            background-color: rgba(255, 255, 255, 0.822);
            /* Fondo semi-transparente blanco */
            padding: 5px;
            /* Añade un pequeño padding para separar el contenido del botón del fondo */
        }

        .pdf-button-container .pdf-button img {
            width: 40px;
            /* Tamaño personalizado para el icono de PDF */
            height: auto;
            /* Mantener la proporción */
        }
    </style>
    <style>
        .btn-custom-orange {
            background-color: #ff8c00;
            /* Color naranja */
            color: #fff;
            /* Texto en color blanco */
            border-color: #ff8c00;
            /* Color del borde */
        }

        .btn-custom-orange:hover {
            background-color: #ff7b00;
            /* Cambio de color al pasar el mouse */
            border-color: #ff7b00;
            /* Cambio de color del borde al pasar el mouse */
        }

        .modal {
            display: none;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #1a73e8;
            /* Color de fondo azul */
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 500px;
            height: 410px;
            box-sizing: border-box;
        }

        .modal-header {
            font-size: 40px;
            padding: 10px;
            background-color: #002060;
            /* Color azul oscuro */
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            color: white;
            text-align: center;
            justify-content: center;
            position: relative;
        }

        .modal-body {
            padding: 20px;
            background-color: #1a73e8;
            /* Color de fondo azul */
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
        }

        .modal-input {
            display: block;
            width: 100%;
            /* Ajustar tamaño por el padding */
            margin: 10px 0;
            padding: 10px;
            border-radius: 10px;
            border: 1px solid #ccc;
            background-color: white;
        }

        .modal-button {
            display: block;
            width: 100%;
            padding: 10px;
            margin: 20px 0 0 0;
            border-radius: 10px;
            border: none;
            background-color: white;
            color: black;
            cursor: pointer;
        }

        .modal-content {
            display: flex;
            flex-direction: row;
            /* Asegurar que los elementos estén en fila */
            justify-content: space-between;
            align-items: center;
            /* Centrar verticalmente los elementos */
            background-color: #1a73e8;
            border: none;
        }

        .modal-input-group {
            display: flex;
            flex-direction: column;
            width: 70%;
        }

        .modal-img {
            width: 150px;
            height: 150px;
            margin-left: 50px;
        }

        .modal-close {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: transparent;
            border: none;
            color: white;
            font-size: 20px;
            cursor: pointer;
        }

        .modal-input {
            display: inline-block;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f9f9f9;
            margin: 5px 0;
            width: calc(100% - 20px);
            /* Ajustar según sea necesario */
            box-sizing: border-box;
        }
    </style>

    @livewireStyles
</head>

<body>

    <div>

        <div id="mySidebar" class="sidebar">
            <div class="header-container">
                <div class="header">
                    <a href="#" class="logo-link">
                        <img src="https://i0.wp.com/sistemasuncp.edu.pe/wp-content/uploads/2023/07/Logo-fis-300x300-1.png?w=300&ssl=1"
                            alt="Tu Imagen" class="logo-img" />
                    </a>
                    <div class="title">
                        <span>BIBLIOTECA FIS</span>
                    </div>
                    <a href="#" class="toggle-nav" onclick="toggleNav()">
                        <img src="https://cdn.icon-icons.com/icons2/1129/PNG/512/menuthreelinesbuttoninterfacesymbol_79952.png"
                            alt="Cerrar Sidebar" class="toggle-icon" />
                    </a>
                </div>
                <div class="sub-header mb-4 ml-4">
                    <img src="{{ asset('imagenes/admin2-SinFondo.png') }}" alt="Logo administrador" class="admin-logo">
                    <p>Administrador</p>
                </div>
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
            .sidebar {

                width: 350px;
                height: 100%;
                position: fixed;
                top: 0;
                left: -250px;
                background-color: rgba(3, 38, 49, 0.83);
                overflow-x: hidden;
                transition: 0.5s;
                padding-top: 60px;
                z-index: 99;
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

            .sidebar .header {
                display: flex;
                align-items: center;
                padding: 0 20px;
                margin-bottom: 30px;
                color: #ffffff;
                font-size: 25px;
                position: relative;
            }

            .header-container {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                padding-top: 20px;
            }

            .header {
                display: flex;
                align-items: center;
                width: 100%;
                justify-content: space-between;
            }

            .logo-link {
                margin-left: 10px;
            }

            .logo-img {
                vertical-align: middle;
                width: 50px;
                height: 50px;
            }

            .title {
                margin-left: 10px;
            }

            .toggle-nav {
                margin-left: 10px;
            }

            .toggle-icon {
                vertical-align: middle;
                width: 20px;
                height: 30px;
                filter: invert(1) brightness(2);
            }

            .sub-header {
                font-size: 25px;
                display: flex;
                align-items: center;
                margin-top: 10px;
                margin-left: 10px;
            }

            .admin-logo {
                height: 67px;
                margin-right: 10px;
            }

            .sub-header p {
                margin: 0;
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
                top: 50%;
                z-index: 4;
                transform: translateY(-50%);
                transition: filter 0.3s ease;
            }

            .openbtn:hover {
                filter: brightness(0.90);
            }
        </style>

        <nav class="navbar">
            <div class="navbar-collapse">
                <div>
                    <button class="openbtn" onclick="toggleNav()">☰</button>
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('imagenes/LOGO_Uncp.jpg') }}" alt="Sin imagen">
                    </a>
                </div>
                <div class="admin-section">
                    <h4>Administrador</h4>
                    <img src="{{ asset('imagenes/admin2.png') }}" alt="Logo Administrador">
                </div>
            </div>
        </nav>
        <li class="nav-item">
            <div class="navbar-title">Libros Prestados</div>
        </li>

        <div class="fade-in">
            <form action="{{ route('prestamos.index') }}" method="GET" class="form-inline">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Buscar una solicitud..."
                        value="{{ request()->get('search') }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </div>

                <div class="pdf-button-container">
                    <a href="{{ route('prestamos.generatePdf') }}" class="pdf-button">
                        <img src="https://cdn.icon-icons.com/icons2/886/PNG/512/file_pdf_download_icon-icons.com_68954.png"
                            alt="Descargar PDF">
                    </a>
                </div>
            </form>
            <br>
            <div class="table-responsive">
                <table class="table table">
                    <thead>
                        <tr>
                            <th>Libro</th>
                            <th>Estudiante</th>
                            <th>Fecha de inicio</th>
                            <th>Fecha devolución</th>
                            <th>Estado Solicitud</th>
                            <th>Estado Devolución</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prestamos as $prestamo)
                            @if ($prestamo->estado_solicitud == 1)
                                <tr>
                                    <td style="max-width: 150px; word-wrap: break-word;">{{ $prestamo->libro->titulo }}
                                    </td>
                                    <td style="max-width: 150px; word-wrap: break-word;">
                                        {{ $prestamo->estudiante->nombre }}</td>
                                    <td>{{ $prestamo->fecha_inicio }}</td>
                                    <td>{{ $prestamo->fecha_devolucion }}</td>
                                    <td>
                                        @if ($prestamo->estado_solicitud == 1)
                                            <!--(-1 rechazado) (0 pendiente) (1 aceptado)-->
                                            <span class="badge badge-pill badge-success">Aceptado</span>
                                        @elseif ($prestamo->estado_solicitud == 0)
                                            <span class="badge badge-pill badge-warning">Pendiente</span>
                                        @elseif ($prestamo->estado_solicitud == -1)
                                            <span class="badge badge-pill badge-danger">Rechazado</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($prestamo->estado_devolucion == 2)
                                            <!--(0 no prestado) (1 pendiente) (2 devuelto)-->
                                            <span class="badge badge-pill badge-success">Devuelto</span>
                                        @elseif ($prestamo->estado_devolucion == 1)
                                            <span class="badge badge-pill badge-warning">Pendiente de devolución</span>
                                        @elseif ($prestamo->estado_devolucion == 0)
                                            <span class="badge badge-pill badge-danger">No prestado</span>
                                        @endif
                                    </td>
                                    <!--(1 aceptado 2 pendiente  --- mostrar bott)-->
                                    <td class="table-buttons">
                                        @if ($prestamo->estado_solicitud == 1 && $prestamo->estado_devolucion == 1)
                                            <form id="devolucionForm">
                                                <button type="button" class="btn btn-custom-orange rounded-pill"
                                                    onclick="openModal()">
                                                    Registrar<br>devolución
                                                </button>
                                            </form>

                                            <div class="modal" id="devolucionModal">
                                                <div class="modal-header">
                                                    Devolución
                                                    <button class="modal-close" onclick="closeModal()">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="modal-content">
                                                        <div class="modal-input-group">
                                                            <span class="modal-input">Título:
                                                                {{ $prestamo->libro->titulo }}</span>
                                                            <span class="modal-input">Nombre:
                                                                {{ $prestamo->estudiante->nombre }}</span>
                                                        </div>
                                                        <img src="{{ asset('imagenes/devolucion.png') }}"
                                                            alt="Devolución" class="modal-img">
                                                    </div>
                                                    <form action="{{ route('prestamos.update', $prestamo->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="action" value="devolver">
                                                        <select id="libro-estado" name="libro_estado"
                                                            class="modal-input">
                                                            <option value="1"
                                                                {{ $prestamo->libro->estado == 1 ? 'selected' : '' }}>
                                                                Libro
                                                                en buen estado</option>
                                                            <option value="0"
                                                                {{ $prestamo->libro->estado == 0 ? 'selected' : '' }}>
                                                                Libro
                                                                en mal estado</option>
                                                        </select>

                                                        <button type="submit" class="modal-button">Devolver</button>
                                                    </form>
                                                </div>


                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        <tr>
                            <th colspan="8">Registros de la solicitud {{ $prestamos->firstItem() }} al
                                {{ $prestamos->lastItem() }} de un
                                total de {{ $prestamos->total() }} registros</th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <div class="pagination justify-content-center">
                @if ($prestamos->onFirstPage())
                    <span class="btn btn-secondary disabled">&laquo; Anterior</span>
                @else
                    <a href="{{ $prestamos->previousPageUrl() }}" class="btn btn-secondary">&laquo; Anterior</a>
                @endif

                @if ($prestamos->hasMorePages())
                    <a href="{{ $prestamos->nextPageUrl() }}" class="btn btn-secondary">Siguiente &raquo;</a>
                @else
                    <span class="btn btn-secondary disabled">Siguiente &raquo;</span>
                @endif
            </div>
        </div>



        <footer class="footer mt-auto py-3 text-center fade-in">
            <div class="container">
                <span class="text-muted">© 2024 Universidad Nacional del Centro del Perú - Facultad de Ingeniería de
                    Sistemas</span>
            </div>
        </footer>





        <style>
            /* Estilo del fondo y footer */
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

            .card {
                box-shadow: transparent;
                border-color: transparent;
                background-color: transparent;
            }

            /* Estilo de la barra de navegación superior */
            .navbar {
                background-color: #ffffff;
                color: #000000;
                border-radius: 10px;
                margin: 20px auto;
                padding: 10px 20px;
                width: 97%;
                height: 140px;
                z-index: 3;
                position: relative;
            }

            .navbar-title {
                font-family: "Itim", cursive;
                font-size: 2.5rem;
                font-weight: bold;
                margin: 0 15px;
                text-align: center;
                color: white;
            }

            .navbar-collapse {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .navbar-brand img {
                width: 400px;
                height: auto;
                margin-left: 75px;
            }

            /* Estilo de la tabla */
            .table {
                font-family: 'Itim', cursive;
                background-color: #ffffff;
                border-radius: 10px;
                overflow: hidden;
                width: 97%;
                margin: auto;
                /* Ajusta este valor según necesites */
                border-collapse: collapse;
            }


            .table thead th {
                background-color: #ffffff;
                color: black;
            }

            .table tbody tr {
                border-bottom: 1px solid #ddd;
                /* Solo líneas horizontales */
            }

            .admin-section {
                display: flex;
                align-items: center;
            }

            .admin-section h4 {
                margin-right: 10px;
            }

            .admin-section img {
                height: 67px;
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
                font-size: 15px;
                border-radius: 5px;
                margin-left: 20px;
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
    </div>

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
                Livewire.emit('hideSidebar');
            }
        });

        window.addEventListener('cerrarModal', event => {
            $('#editarLibroModal').modal('hide');
            $('#addLibroModal').modal('hide');
            $('#borrarLibroModal').modal('hide');
            $('#generandopdfModal').modal('hide');
        })

        function openModal() {
            document.getElementById('devolucionModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('devolucionModal').style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById('devolucionModal')) {
                closeModal();
            }
        }
    </script>



    {{-- bootstrap scrips --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
    @livewireScripts
</body>

</html>
