<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitudes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="shortcut icon" type="image/x-icon" href="https://uncp.edu.pe/wp-content/uploads/2019/10/favicon.ico">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
            max-width: 2000px; /* Ajusta el ancho máximo del contenedor */
            width: 100%;
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
            margin-left: 20%;
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

        /* Barra Lateral*/
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

        .navbar-nav .nav-link {
            display: flex;
            align-items: center;
            color: #ffffff;
            position: absolute;
            right: 20px;
            top: 30px
        }

        //modelo

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
        }


        .modal-body {
            background-color: #1C45AF;
            padding: 20px;
            text-align: center;
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
            /* Alinear elementos a la parte superior */
        }

        .book-details-left {
            margin-right: 20px;
            /* Espacio entre la imagen y el texto */
        }

        .book-details-right {
            flex: 1;
            /* Ocupar el espacio restante */
        }

        .modal-custom {
            display: none;
            position: fixed;
            z-index: 1050;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.1);
            /* Hacer el fondo completamente transparente */
        }

        .modal-content-custom {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 300px;
            border-radius: 10px;
            text-align: center;
            z-index: 1060;
        }

        .icon-custom {
            font-size: 48px;
            color: #ffd700;
        }

        .buttons-custom {
            margin-top: 20px;
        }

        .btn-custom {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-cancel-custom {
            background-color: #f44336;
            color: white;
            margin-right: 10px;
        }

        .btn-confirm-custom {
            background-color: #4CAF50;
            color: white;
        }

        .white-label {
            color: white;
        }

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
        font-weight: bold;
    }

    .modal-body p {
        margin-bottom: 0;
        font-size: 1rem;
        color: #6c757d;
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
                        <img class="card-img-top" src="{{ asset('imagenes/logo uncp.png') }}" alt="Sin imagen">
                    </a>
                </li>
            </ul>

            <!-- Logo con texto "Administrador" a la derecha -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    @auth
                    <a class="nav-link" href="#">
                        <h4>Bienvenido, {{ strtok(Auth::user()->name, ' ') }}</h4>
                        <img src="{{ asset('imagenes/admin2.png') }}" alt="Logo Administrador" style="height: 67px; margin-right: 50px;">
                    </a>
                    @else
                    <a class="nav-link" href="{{ route('login') }}">
                        <h4>Bienvenido Administrador</h4>
                        <img src="{{ asset('imagenes/admin2.png') }}" alt="Logo Administrador" style="height: 67px; margin-right: 50px;">
                    </a>
                    @endauth
                </li>
            </ul>
        </div>
    </nav>



    <li class="nav-item">
        <div class="navbar-title">Préstamo solicitado</div>
    </li>


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
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">>Cerrar Sesión</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @endauth
    </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Lista de Solicitudes Pendientes</div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Título del Libro</th>
                                <th>Nombre del Estudiante</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($solicitudes as $solicitud)
                            <tr>
                                <td>{{ $solicitud->libro->titulo }}</td>
                                <td>{{ $solicitud->estudiante->nombre }}</td>
                                <td>
                                    @if ($solicitud->estado_solicitud == 0)
                                        <span class="text-warning">Pendiente</span>
                                    @elseif ($solicitud->estado_solicitud == 1)
                                        <span class="text-success">Aceptado</span>
                                    @elseif ($solicitud->estado_solicitud == -1)
                                        <span class="text-danger">Rechazado</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($solicitud->estado_solicitud == 0)
                                        <button type="button" class="btn btn-success btn-sm" data-id="{{ $solicitud->id }}" data-titulo="{{ $solicitud->libro->titulo }}" data-autor="{{ $solicitud->libro->autor }}" data-nombre="{{ $solicitud->estudiante->nombre }}" data-action="accept" onclick="openValidationModal(this)">Aceptar</button>
                                        <button type="button" class="btn btn-danger btn-sm" data-id="{{ $solicitud->id }}" data-action="reject" onclick="openModal(this)">Rechazar</button>
                                    @else
                                        <span class="text-muted">Procesado</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <th colspan="4">Registros del {{ $solicitudes->firstItem() }} al {{ $solicitudes->lastItem() }} de un total de {{ $solicitudes->total() }} registros</th>
                            </tr>
                        </tbody>
                    </table>

                    <div class="pagination justify-content-center">
                        @if ($solicitudes->onFirstPage())
                            <span class="btn btn-secondary disabled">&laquo; Anterior</span>
                        @else
                            <a href="{{ $solicitudes->previousPageUrl() }}" class="btn btn-secondary">&laquo; Anterior</a>
                        @endif

                        @if ($solicitudes->hasMorePages())
                            <a href="{{ $solicitudes->nextPageUrl() }}" class="btn btn-secondary">Siguiente &raquo;</a>
                        @else
                            <span class="btn btn-secondary disabled">Siguiente &raquo;</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer mt-auto py-3 text-center fade-in">
    <div class="container">
        <span class="text-muted">© 2024 Universidad Nacional del Centro del Perú - Facultad de Ingeniería de Sistemas</span>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
    function toggleNav() {
        const sidebar = document.getElementById("mySidebar");
        sidebar.classList.toggle('sidebar-visible');
    }
</script>

<!-- Modal -->
<div id="confirmModal" class="modal-custom">
    <div class="modal-content-custom">
        <div class="icon-custom">!</div>
        <p>¿Estás seguro que deseas realizar esta acción?</p>
        <div class="buttons-custom">
            <button class="btn btn-cancel-custom" onclick="closeModal()">Cancelar</button>
            <form id="modalForm" action="" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-confirm-custom">Confirmar</button>
            </form>
        </div>
    </div>
</div>

<script>
    var modal = document.getElementById("confirmModal");

function openModal(button) {
    var id = button.getAttribute('data-id');
    var action = button.getAttribute('data-action');
    var form = document.getElementById('modalForm');

    if (action === 'accept') {
        form.action = '{{ url("solicitudes") }}/' + id + '/accept';
    } else if (action === 'reject') {
        form.action = '{{ url("solicitudes") }}/' + id + '/reject';
    }

    modal.style.display = "block";
}

function closeModal() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        closeModal();
    }
}
</script>

<!-- Modal para registrar solicitud -->
<div class="modal fade" id="validateDataModal" tabindex="-1" role="dialog" aria-labelledby="validateDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <img class="card-img-left" style="width: 80px; height: 80px;" src="{{ asset('imagenes/icono.png') }}" alt="">
                <h5 class="modal-title mx-auto" id="validateDataModalLabel">Registrar Préstamo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <div class="row">
                    <div class="col-md-6">
                        <form id="validateDataForm">
                            <div class="form-group">
                                <input type="text" class="form-control" id="bookTitleInput" readonly>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="authorInput" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nombreInput" class="white-label">NOMBRE DEL SOLICITANTE:</label>
                                <input type="text" class="form-control" id="nombreInput" readonly>
                            </div>
                            <div class="form-group">
                                <label for="entregaInput" class="white-label">FECHA DE ENTREGA:</label>
                                <input type="date" class="form-control" id="entregaInput" readonly>
                            </div>
                            <div class="form-group">
                                <label for="devolucionInput" class="white-label">FECHA DE DEVOLUCIÓN:</label>
                                <input type="date" class="form-control" id="devolucionInput" required>
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
                        <button type="button" class="btn btn-primary" id="validateButton">Registrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="solicitudEnviadaModal" tabindex="-1" role="dialog" aria-labelledby="solicitudEnviadaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content custom-modal-content">
            <div class="modal-body">
                <div class="check-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-check-circle text-success" viewBox="0 0 16 16">
                        <path d="M6.79 12.57L3.19 9.5a.75.75 0 1 1 1.06-1.06L7.25 10.44l4.72-4.72a.75.75 0 1 1 1.06 1.06l-5.25 5.25a.75.75 0 0 1-1.06 0z"/>
                    </svg>
                </div>
                <h5 class="modal-title" id="solicitudEnviadaLabel">Solicitud de préstamo con éxito!</h5>
                <p>Tu solicitud fue aceptada.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnVolverInicio" data-dismiss="modal">Volver al inicio</button>
            </div>
        </div>

        <script>
            function openValidationModal(button) {
                var id = button.getAttribute('data-id');
                var titulo = button.getAttribute('data-titulo');
                var autor = button.getAttribute('data-autor');
                var nombre = button.getAttribute('data-nombre');

                document.getElementById('bookTitleInput').value = titulo;
                document.getElementById('authorInput').value = autor;
                document.getElementById('nombreInput').value = nombre;

        // Establecer la fecha de entrega con la fecha actual
        var today = new Date().toISOString().split('T')[0];
        document.getElementById('entregaInput').value = today;

        // Calcular la fecha de devolución (7 días después de la fecha de entrega)
        var entregaDate = new Date(today);
        var devolucionDate = new Date(entregaDate.setDate(entregaDate.getDate() + 7));
        var formattedDevolucionDate = devolucionDate.toISOString().split('T')[0];
        document.getElementById('devolucionInput').value = formattedDevolucionDate;

        // Guardar el ID de la solicitud en el botón de aceptar
        document.getElementById('validateButton').setAttribute('data-id', id);

        $('#validateDataModal').modal('show');
    }

    document.getElementById('validateButton').addEventListener('click', function() {
        var id = this.getAttribute('data-id');
        var entrega = document.getElementById('entregaInput').value;
        var devolucion = document.getElementById('devolucionInput').value;

        // Realizar la solicitud al servidor
        fetch(`/solicitudes/${id}/accept`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ fecha_entrega: entrega, fecha_devolucion: devolucion })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                $('#validateDataModal').modal('hide');
                $('#solicitudEnviadaModal').modal('show');
                
            } else {
                document.getElementById('validationResult').innerText = 'Error al aceptar la solicitud.';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('validationResult').innerText = 'Error al aceptar la solicitud.';
        });

        document.getElementById('btnVolverInicio').addEventListener('click', function() {
    location.reload();
});
    });
</script>



</body>

</html>