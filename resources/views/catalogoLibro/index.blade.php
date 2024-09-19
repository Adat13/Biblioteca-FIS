<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Libros</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="https://uncp.edu.pe/wp-content/uploads/2019/10/favicon.ico">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://www.google.com/recaptcha/api.js"></script>
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
    background-color: #ffffff; /* Color blanco para navbar y footer */
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

.navbar h2 {
    margin: 0;
    text-align: center;
    flex-grow: 1;
    color: black; /* Asegura que el texto del título sea visible */
}

.navbar-nav {
    display: flex;
    align-items: center;
}

.navbar .navbar-collapse {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
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

.table th, .table td {
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

@keyframes fadeIn {
    from {
        opacity: 0;
    }

    to {
        opacity: 1;
    }
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
    margin-left: 20%;
    margin-left: 20%;
}

.btn-secondary {
    color: #fff;
    background-color: #0088ff;
    border-color: #57b1ff;
    margin-left: 3%;
    color: #fff;
    background-color: #0088ff;
    border-color: #57b1ff;
    margin-left: 3%;
}

td.table-buttons {
    width: 10%;
    width: 10%;
}

/* Barra Lateral*/
.sidebar {
    width: 350px;
    height: 100%;
    position: fixed;
    top: 0;
    right: -350px;
    background-color: rgba(0, 0, 0, 0.7);
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
    z-index: 1000;
}
.sidebar a {
    padding: 10px 80px;
    text-decoration: none;
    font-size: 20px;
    color: #ffffff;
    display: block;
    transition: 0.3s;
}
.sidebar a:hover {
    color: #f1f1f1;
    background-color: rgba(255, 255, 255, 0.1);
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

.sidebar .closebtn {
    position: absolute;
    top: 0;
    right: 10px;
    font-size: 36px;
    margin-left: 10px;
}

.openbtn {
    font-size: 40px;
    cursor: pointer;
    background-color: #ffffff;
    color: rgb(0, 0, 0);
    padding: -2px 15px;
    border: none;
    position: absolute;
    left: 10px;
    /* Alineado a la izquierda */
    top: 20px;
}

.openbtn:hover {
    background-color: #444;
}

.navbar-nav .nav-link {
    display: flex;
    align-items: center;
    color: #ffffff;
    position: absolute;
    right: 20px;
    top: 30px;
}

.modal-header {
    background-color: #007bff;
    color: white;
}

.modal-header {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: start;
    -ms-flex-align: start;
    align-items: flex-start;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    padding: 1rem;
    border-bottom: 1px solid #e9ecef;
    border-top-left-radius: .3rem;
    border-top-right-radius: .3rem;
    background-color: #082368;
    color: white;
    height: 110px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: start;
    -ms-flex-align: start;
    align-items: flex-start;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    padding: 1rem;
    border-bottom: 1px solid #e9ecef;
    border-top-left-radius: .3rem;
    border-top-right-radius: .3rem;
    background-color: #082368;
    color: white;
    height: 110px;
}

.modal-body {
    background-color: #1C45AF;
    padding: 20px;
    text-align: center;
}

.modal-body {
    display: flex;
    flex-direction: column; /* Cambia la dirección del contenido a columna */
    align-items: left;
    justify-content: left;
    background-color: #205FA3;
}

.modal-body h5 {
    font-size: 24px;
    font-weight: bold;
    color: #000;
}

.modal-body img {
    width: 150px;
    height: auto;
    margin-bottom: 15px;
}

.modal-body .book-details {
    background-color: #ffffff;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: left;
}

.modal-body .book-details h3 {
    font-size: 22px;
    margin-bottom: 10px;
}

.modal-body .book-details p {
    margin: 5px 0;
    font-size: 16px;
    color: #333;
}

.modal-body .book-description {
    margin-top: 15px;
    text-align: left;
}

.modal-body .book-description h4 {
    font-size: 18px;
    font-weight: bold;
    color: #000;
    margin-bottom: 10px;
}

.modal-body .book-description p {
    font-size: 16px;
    color: #333;
}

.book-details {
    display: flex;
    align-items: flex-start;
    margin-bottom: 20px; /* Añade espacio debajo de los detalles del libro */
}

.book-details-left {
    margin-right: 20px; /* Añade espacio entre la imagen y el contenido */
}

.book-details-right {
    flex: 1; /* Ocupa el espacio restante */
}

.book-details-right p {
    margin: 0; /* Remueve el margen inferior */
}

.book-details-right h5 {
    margin-top: 0; /* Remueve el margen superior */
}

.book-details-right p {
    margin: 5px 0; /* Añade un margen inferior de 5px */
}

        /* Aplicar fuente Itim regular al texto dentro del botón */
        .btn-prestar {
            font-family: 'Itim', sans-serif;
            /* Utiliza la fuente Inter */
            font-weight: 400;
            /* Peso de fuente extra bold */
        }

        /* Aplicar fuente Itim regular al texto dentro de los botones de "Ver" */
        .btn-info {
            font-family: 'Itim', sans-serif;
            /* Utiliza la fuente Inter */
            font-weight: 400;
            /* Peso de fuente extra bold */
        }

        /* Aplicar fuente Inter al texto dentro de los inputs */
        input[type="text"] {
            font-family: 'Inter', sans-serif;
            /* Utiliza la fuente Inter */
            font-weight: bold;
            /* Para la variante extra bold de la fuente Inter */
        }

        .modal-header {
            background-color: #082368;
            color: white;
            text-align: center;
            border-bottom: 0;
        }

        .modal-header h5 {
            font-family: 'Itim', sans-serif;
            font-size: 2.5rem;
            margin: auto;
        }

        .modal-body {
            display: flex;
            align-items: left;
            justify-content: left;
            background-color: #205FA3;
        }

        .form-group input {
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .modal-footer {
            justify-content: center;
            border-top: 0;
        }

        .btn-primary {
            background-color: #1E3D58;
            border-color: #1E3D58;
        }

        .btn-secondary {
            background-color: #7d766c;
            border-color: #6C757D;
        }

        .check-icon {
            text-align: center;
            margin-bottom: 20px;
        }
        .modal-body .book-description p {
            text-align: left; /* Alinea el texto a la izquierda */
        }

        .sub-header {
            display: flex;
            align-items: center;
            padding: 0 25px;
            margin-bottom: 10px;
            color: #ffffff;
        }
        .sub-header p {
            margin: 0;
            font-size: 25px;
        }
        .sub-header img {
            margin-top: 10px;
        }

/* Estilos del botón de menú */
.openbtn {
    font-size: 40px;
    cursor: pointer;
    background-color: #ffffff;
    color: rgb(0, 0, 0);
    padding: 10px 15px;
    border: none;
    position: absolute;
    left: 10px; /* Alineado a la izquierda */
    top: 20px;
}

.openbtn:hover {
    background-color: #444;
}

/* Ajustes para tabletas */
/* Ajustes para tabletas */

@media (max-width: 1380px) {
    .openbtn {
        font-size: 60px; /* Tamaño más pequeño para tabletas */
        padding: 6px 10px;
        margin-left: 20px;
        border-radius: 30%;
    }

    .navbar-brand img {
        width: 270px; /* Tamaño más pequeño para tabletas */
        height: 100px;
        left: 15px; /* Ajuste de posición */
        margin-left: 50px;
    }

    .navbar-title {
        font-size: 2rem;
    }

    .table-buttons .btn {
        margin-left: 2px;
        margin-right: 2px;
    }

    input.form-control {
        margin-left: 0;
    }

    .btn-secondary {
        margin-left: 2%;
    }

    /* Ocultar título en tabletas */
    h2 {
        display: none;
    }
}

@media (max-width: 991.98px) {
    .openbtn {
        font-size: 60px; /* Tamaño más pequeño para tabletas */
        padding: 6px 10px;
        margin-left: 20px;
        border-radius: 30%;
    }

    .navbar-brand img {
        width: 270px; /* Tamaño más pequeño para tabletas */
        height: 100px;
        left: 15px; /* Ajuste de posición */
        margin-left: 50px;
    }

    .navbar-title {
        font-size: 2rem;
    }

    .table-buttons .btn {
        margin-left: 2px;
        margin-right: 2px;
    }

    input.form-control {
        margin-left: 0;
    }

    .btn-secondary {
        margin-left: 2%;
    }

    /* Ocultar título en tabletas */
    h2 {
        display: none;
    }
}

/* Ajustes para móviles */
@media (max-width: 767.98px) {
    .openbtn {
        font-size: 80px; /* Tamaño más pequeño para móviles */
        padding: 6px 10px;
        left: 0;
        top: 0;
        border-radius: 30%;
    }

    .navbar-brand img {
        width: 150px; /* Tamaño más pequeño para móviles */
        left: 10px; /* Ajuste de posición */
    }

    .navbar-title {
        font-size: 2.5rem;
    }

    .navbar-nav img {
        display: none; /* Ocultar menú de navegación en móviles */
    }

    .table-buttons .btn {
        margin-left: 1px;
        margin-right: 1px;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .table th:nth-child(2),
    .table td:nth-child(2),
    .table th:nth-child(3),
    .table td:nth-child(3),
    .table th:nth-child(4),
    .table td:nth-child(4),
    .table th:nth-child(5),
    .table td:nth-child(5) {
        display: none; /* Ocultar columnas excepto la primera y la última */
    }

    .table {
        width: 100%;
    }

    .btn-secondary {
        margin-left: 50%;
    }

    .h4, h4 {
        font-size: 1.5rem;
        margin-top: 20px;
    }

    /* Ocultar título en móviles */
    h2 {
        display: none;
    }
}

}
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <button class="openbtn" onclick="toggleNav()">&#9776;</button>
                </li>
                <li class="nav-item">
                    <a class="navbar-brand" href="#">
                        <img class="card-img-top" src="{{ asset('imagenes/LOGO_Uncp.jpg') }}" alt="Sin imagen">
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <h2>Biblioteca Especializada Facultad de Ingenieria de Sistemas</h2>
                </li>
            </ul>
            <!-- Logo con texto "Administrador" a la derecha -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    @auth
                        <a class="nav-link" href="{{ route('solicitudes.index') }}">
                            <h4>Bienvenido, {{ strtok(Auth::user()->name, ' ') }}</h4>
                            <img src="{{ asset('imagenes/admin2.png') }}" alt="Logo Administrador"
                                style="height: 60px; margin-right: 60px;">
                        </a>
                    @else
                        <a class="nav-link" href="{{ route('login') }}">
                            <h4></h4>
                            <img src="{{ asset('imagenes/admin2.png') }}" alt="Logo Administrador"
                                style="height: 60px; margin-right: 60px;">
                        </a>
                    @endauth
                </li>
            </ul>
        </div>
    </nav>


<br>

<div id="mySidebar" class="sidebar">
    <div class="header">
        <img src="{{ asset('imagenes/logo2.png') }}" alt="Logo FIS" style="height: 67px; margin-right: 20px;">
        <div>
            <span>BIBLIOTECA</span>
            <p>FIS</p>
        </div>
        <a href="javascript:void(0)" class="closebtn" onclick="toggleNav()">&#9776;</a>
    </div>


</div>

<div class="fade-in">
    <form action="{{ route('catalogoLibro.index') }}" method="GET" class="form-inline">
        <div class="input-group mt-3">
            <input type="text" name="search" class="form-control" placeholder="Buscar un libro" value="{{ request()->get('search') }}">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </div>

    <div class="dropdown mt-3 ml-2">

        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Filtrar por Categoría
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{ route('catalogoLibro.index', ['category' => 'L-OG']) }}">L-OG</a>
            <a class="dropdown-item" href="{{ route('catalogoLibro.index', ['category' => 'L-CEN']) }}">L-CEN</a>
            <a class="dropdown-item" href="{{ route('catalogoLibro.index', ['category' => 'L-CS']) }}">L-CS</a>
            <a class="dropdown-item" href="{{ route('catalogoLibro.index', ['category' => 'L-CA']) }}">L-CA</a>
            <a class="dropdown-item" href="{{ route('catalogoLibro.index', ['category' => 'L-PEI']) }}">L-PEI</a>
        </div>
    </div>
</form>
    <br>
    <div class="table-responsive">
        <table class="table table">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Subtítulo</th>
                    <th>Autor</th>
                    <th>Año</th>
                    <th>Editorial</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($libros as $libro)
                <tr>
                    <td>{{ $libro->titulo }}</td>
                    <td>{{ $libro->subtitulo }}</td>
                    <td>{{ $libro->autor }}</td>
                    <td>{{ $libro->anio }}</td>
                    <td>{{ $libro->editorial }}</td>
                    <td class="table-buttons">
                        <div class="btn-group">
                            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#bookModal"
                               data-titulo="{{ $libro->titulo }}"
                               data-autor="{{ $libro->autor }}"
                               data-anio="{{ $libro->anio }}"
                               data-editorial="{{ $libro->editorial }}"
                               data-ejemplar="{{ $libro->ejemplar }}"
                               data-codigo="{{ $libro->codigo }}"
                               data-descripcion="{{ $libro->descripcion }}">
                                Ver
                            </a>
                            <a href="#" class="btn btn-success btn-prestar" data-toggle="modal" data-target="#validateDataModal"
                               data-titulo="{{ $libro->titulo }}"
                               data-autor="{{ $libro->autor }}">
                                Prestar
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <th colspan="6">Registros del {{ $libros->firstItem() }} al {{ $libros->lastItem() }} de un total de {{ $libros->total() }} registros</th>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <div class="pagination justify-content-center">
        @if ($libros->onFirstPage())
            <span class="btn btn-info disabled">&laquo; Anterior</span>
        @else
            <a href="{{ $libros->previousPageUrl() }}" class="btn btn-info">&laquo; Anterior</a>
        @endif

        @if ($libros->hasMorePages())
            <a href="{{ $libros->nextPageUrl() }}" class="btn btn-info">Siguiente &raquo;</a>
        @else
            <span class="btn btn-info disabled">Siguiente &raquo;</span>
        @endif
    </div>
</div>
<footer class="footer mt-auto py-3 text-center fade-in">
    <div class="container">
        <span class="text-muted">© 2024 Universidad Nacional del Centro del Perú - Facultad de Ingeniería de Sistemas</span>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
    function toggleNav() {
        const sidebar = document.getElementById("mySidebar");
        if (sidebar.style.right === "0px") {
            sidebar.style.right = "-250px";
        } else {
            sidebar.style.right = "0px";
        }
    }
    </script>

    <!-- Modal -->
    <div class="modal fade" id="bookModal" tabindex="-1" role="dialog" aria-labelledby="bookModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img class="card-img-top" style="width: 90px; height: 70px;" src="{{ asset('imagenes/icono.png') }}"
                        alt="">
                    <h2 class="modal-title" id="bookModalLabel">Información del LIBRO</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="book-details">
                        <div class="book-details-right">
                            <h3 id="bookTitle"></h3>
                            <p id="bookAuthor"></p>
                            <p id="bookYear"></p>
                            <p id="bookEditorial"></p>
                            <p id="bookCantidad"></p>
                            <p id="bookCodigo"></p>
                        </div>
                    </div>
                    <div id="bookDescriptionContainer" class="book-description">
                        <p id="bookDescription">BIBLIOTECA Facultad de Ing de Sistemas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#bookModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Botón que activó el modal
        var titulo = button.data('titulo');
        var autor = button.data('autor');
        var anio = button.data('anio');
        var editorial = button.data('editorial');
        var ejemplar = button.data('ejemplar');
        var codigo = button.data('codigo');
        var descripcion = button.data('descripcion');
        var imagen = button.data('imagen'); // Nueva línea para obtener la imagen

        // Actualizar el contenido del modal
        var modal = $(this);
        modal.find('#bookTitle').text(titulo);
        modal.find('#bookAuthor').text("Autor: " + autor);
        modal.find('#bookYear').text("Año de publicación: " + anio);
        modal.find('#bookEditorial').text("Editorial: " + editorial);
        modal.find('#bookCantidad').text("Cantidad: " + ejemplar);
        modal.find('#bookCodigo').text("Código: " + codigo);
        modal.find('#bookDescription').text(descripcion);
        modal.find('#bookImage').attr('src', imagen); // Nueva línea para actualizar la imagen
    });
    </script>

<!-- Modal para Validar Datos -->
<div class="modal fade" id="validateDataModal" tabindex="-1" role="dialog" aria-labelledby="validateDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <img class="card-img-left" style="width: 80px; height: 80px;" src="{{ asset('imagenes/icono.png') }}" alt="">
                <h5 class="modal-title mx-auto" id="validateDataModalLabel">Registrar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <div class="row">
                    <div class="col-md-6">
                        <form id="validateDataForm">
                            <div class="form-group">
                                <input type="text" class="form-control" id="nombreInput" placeholder="Apellidos y Nombres" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="dniInput" placeholder="DNI" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="codigoInput" placeholder="Código de Estudiante" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="bookTitleInput" readonly>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="authorInput" readonly>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 d-flex align-items-center justify-content-center">
                        <img class="card-img-center" style="width: 150px; height: 150px;" src="{{ asset('imagenes/Icono2.jpg') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div id="validationResult"></div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary g-recaptcha"
                        id="validateButton"
                        data-sitekey="6Lc-whEqAAAAACpHdHrsTuwmfjh1YOztGFc_ckFG"
                        data-callback='onSubmit'
                        data-action='submit'>Registrar Préstamo</button>
            </div>
        </div>
    </div>
</div>

<script>
    function onSubmit(token) {
      document.getElementById("validateButton").submit();
    }
  </script>

<style>
    .custom-modal-content {
        background-color: white;
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
    }

    .custom-modal-content .modal-header {
        border-bottom: none;
        display: flex;
        justify-content: flex-end;
        background-color: rgb(158, 59, 59); /* Asegúrate de que el fondo del encabezado sea transparente */
    }

    .custom-modal-content .modal-footer {
        border-top: none;
        justify-content: center;
        background: none; /* Asegúrate de que el fondo del pie de página sea transparente */
    }

    .custom-modal-content .check-icon {
        margin-bottom: 30px;
    }

    .custom-modal-content .modal-body {
        padding: 1px 1px;
        background: none; /* Asegúrate de que el fondo del cuerpo sea transparente */
    }

    .custom-modal-content .btn {
        background-color: #dc3545;
        border-color: #dc3545;
        color: white;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
    }

    .custom-modal-content .btn:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }

    .custom-modal-content .close {
        color: #000;
        opacity: 1;
        font-size: 1.5rem;
    }

    .custom-modal-content .close:hover {
        color: #000;
        opacity: 0.75;
    }

    .modal-title {
        margin-top: 0;
        margin-bottom: 10px;
        font-size: 1.5rem;
    }

    .modal-body p {
        margin-bottom: 0;
        font-size: 1rem;
        color: #6c757d;
    }
</style>

<!-- Modal Solicitud Enviada -->
<div class="modal fade" id="solicitudEnviadaModal" tabindex="-1" role="dialog" aria-labelledby="solicitudEnviadaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content custom-modal-content">
            <div class="modal-body">
                <div class="check-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-check-circle text-success" viewBox="0 0 16 16">
                        <path d="M6.79 12.57L3.19 9.5a.75.75 0 1 1 1.06-1.06L7.25 10.44l4.72-4.72a.75.75 0 1 1 1.06 1.06l-5.25 5.25a.75.75 0 0 1-1.06 0z"/>
                    </svg>
                </div>
                <h5 class="modal-title" id="solicitudEnviadaLabel">Solicitud enviada con éxito!</h5>
                <p>Tu solicitud fue enviada al responsable de biblioteca.
                    Para recaudar el libro deberá acercarse a la biblioteca especializada en el horario de 8am a 2pm</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnVolverInicio" data-dismiss="modal">Volver al inicio</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
    function toggleNav() {
        const sidebar = document.getElementById("mySidebar");
        if (sidebar.style.left === "0px") {
            sidebar.style.left = "-350px";
        } else {
            sidebar.style.left = "0px";
        }
    }
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $('#validateButton').click(function() {
        var nombre = $('#nombreInput').val();
        var dni = $('#dniInput').val();
        var codigo = $('#codigoInput').val();
        var titulo_libro = $('#bookTitleInput').val(); // Obtener el título del libro
        var autor = $('#authorInput').val(); // Obtener el autor del libro

        if (nombre === '' || dni === '' || codigo === '') {
            $('#validationResult').text('Todos los campos son obligatorios.').css('color', 'red');
            return;
        }

        $.ajax({
            url: '{{ route("validar") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                nombre: nombre,
                dni: dni,
                codigo: codigo,
                titulo_libro: titulo_libro, // Incluir el título del libro
                autor: autor // Incluir el autor del libro
            },
            dataType: 'json',

            success: function(response) {
                console.log('Respuesta del servidor:', response);
                if (response.valido) {
                    $('#validateDataModal').modal('hide');
                    $('#solicitudEnviadaModal').modal('show');
                } else {
                    $('#validationResult').text('Datos del estudiante incorrectos.').css('color', 'red');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('Error en la petición AJAX:');
                console.log('Estado:', textStatus);
                console.log('Error:', errorThrown);
                console.log('Respuesta completa:', jqXHR);
                $('#validationResult').text('Error en la validación. Intente nuevamente.').css('color', 'red');
            }
        });
    });

    $(document).ready(function() {
        $('#validateDataModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var titulo = button.data('titulo');
            var autor = button.data('autor');
            var modal = $(this);
            modal.find('#bookTitleInput').val(titulo); // Rellenar el nombre del libro en el input
            modal.find('#authorInput').val(autor); // Rellenar el autor del libro en el input

            // Limpiar los campos del formulario al mostrar el modal
            modal.find('#nombreInput').val(''); // Limpiar campo de Nombre del estudiante
            modal.find('#codigoInput').val(''); // Limpiar campo de código del estudiante
            modal.find('#dniInput').val(''); // Limpiar campo de DNI

            // Restaurar placeholders
            modal.find('#nombreInput').attr('placeholder', 'Apellidos y Nombres');
            modal.find('#codigoInput').attr('placeholder', 'Código de Estudiante');
            modal.find('#dniInput').attr('placeholder', 'DNI');
        });

        $('#codigoInput, #dniInput, #nombreInput').on('focus', function () {
            // Limpiar el placeholder al hacer foco en el campo
            $(this).attr('placeholder', '');
        });

        $('#codigoInput, #dniInput, #nombreInput').on('blur', function () {
            // Restaurar el placeholder si el campo está vacío al perder el foco
            if ($(this).val() === '') {
                if ($(this).attr('id') === 'codigoInput') {
                    $(this).attr('placeholder', 'Código de Estudiante');
                } else if ($(this).attr('id') === 'dniInput') {
                    $(this).attr('placeholder', 'DNI');
                } else if ($(this).attr('id') === 'nombreInput') {
                    $(this).attr('placeholder', 'Apellidos y Nombres');
                }
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Obtiene el botón "Volver al inicio" por su ID
        var btnVolverInicio = document.getElementById('btnVolverInicio');

        // Agrega un event listener para el clic en el botón
        btnVolverInicio.addEventListener('click', function() {
            // Simula la redirección a la vista principal
            window.location.href = '/catalogoLibro'; // Coloca aquí la URL de tu vista principal
        });
    });
</script>
