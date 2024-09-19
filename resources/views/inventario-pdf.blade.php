<!-- Esto es el HTML para el diseño del pdf con la tabla del inventario -->
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Reporte de Inventario</title>

    <style>
        body {
            font-size: 12px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 2px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .title {
            font-size: 20px;
            font-weight: bold;
            text-align: left;
        }

        .date {
            font-size: 14px;
            text-align: right;
        }

        .table-container {
            width: 100%;
            text-align: left;
            margin: 0 auto;
        }

        .table {
            width: 90%;
            /* Puedes ajustar este valor según tus necesidades */
            max-width: 950px;
            /* Establece un ancho máximo para la tabla */
            margin: 0 auto;
            border-collapse: collapse;
            font-size: 10px;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        .table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .table td {
            word-wrap: break-word;
            max-width: 150px;
        }

        .card {
            border: none;
        }

        .card-header {
            border-bottom: none;
        }
    </style>

    @livewireStyles

</head>

<body>
    <div class="header">
        <div class="title">Reporte de Inventario de Libros</div>
        <div class="date">Generado: {{ \Carbon\Carbon::now()->format('d/m/Y') }}</div>
    </div>
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Código</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Año</th>
                    <th>Editorial</th>
                    <th>Edición</th>
                    <th>Ejemplar</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($libros as $libro)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$libro->codigo}}</td>
                    <td>{{$libro->titulo}}</td>
                    <td>{{$libro->autor}}</td>
                    <td>{{$libro->anio}}</td>
                    <td>{{$libro->editorial}}</td>
                    <td>{{$libro->edicion}}</td>
                    <td>{{$libro->ejemplar}}</td>
                    <td>
                        @if ($libro->estado == 1)
                        Buen Estado
                        @elseif ($libro->estado == 0)
                        Deteriorado
                        @else
                        Estado Desconocido
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <footer class="footer mt-auto py-3 text-center fade-in">
            <div class="container">
                <span class="text-muted">© 2024 Universidad Nacional del Centro del Perú - Facultad de Ingeniería de
                    Sistemas</span>
            </div>
        </footer>
    </div>

    @livewireScripts
</body>

</html>