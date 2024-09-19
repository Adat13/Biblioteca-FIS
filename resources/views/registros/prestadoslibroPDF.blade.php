<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Préstamos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f9f9f9;
            text-align: center;
        }
        .download-date {
            text-align: right;
            margin-right: 20px;
            margin-bottom: 10px;
            font-size: 12px;
            color: #555;
        }
        .container {
            width: 100%;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        .table-responsive {
            width: 100%;
            margin: 0 auto;
            overflow-x: auto;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            table-layout: fixed;
        }
        .table th, .table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .table th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
        }
        .table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .table tr:nth-child(odd) {
            background-color: #ffffff;
        }
        .table tr:hover {
            background-color: #e0e0e0;
        }
        .wrap-text {
            max-width: 150px;
            word-wrap: break-word;
            white-space: normal;
        }
        .badge {
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 12px;
        }
        .badge-danger {
            color: #fff;
            background-color: #dc3545;
        }
        .badge-success {
            color: #fff;
            background-color: #28a745;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="download-date">
            Descargado el: {{ date('Y-m-d H:i:s') }}
        </div>
        <h1>Listado de Préstamos</h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Libro</th>
                        <th>Estudiante</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha devolución</th>
                        <th>Estado Solicitud</th>
                        <th>Estado Devolución</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prestamos as $prestamo)
                        <tr>
                            <td class="wrap-text">{{$prestamo->libro->titulo }}</td>
                            <td class="wrap-text">{{ $prestamo->estudiante->nombre}}</td>
                            <td>{{ $prestamo->fecha_inicio }}</td>
                            <td>{{ $prestamo->fecha_devolucion }}</td>
                            <td>
                                @if ($prestamo->estado_solicitud == 1)
                                    <span class="badge badge-success">Aceptado</span>
                                @elseif ($prestamo->estado_devolucion == 0)
                                    <span class="badge badge-danger">Pendiente</span>
                                @elseif ($prestamo->estado_devolucion == -1)
                                    <span class="badge badge-success">Rechazado</span>
                                @endif
                            </td>
                            <td>
                                @if ($prestamo->estado_devolucion == 2)
                                    <span class="badge badge-success">Devuelto</span>
                                @elseif ($prestamo->estado_solicitud == 1)
                                    <span class="badge badge-danger">Pendiente de devolución</span>
                                @elseif ($prestamo->estado_solicitud == 0)
                                    <span class="badge badge-secondary">No prestado</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
