<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .btn-logout {
            background-color: #dc3545;
        }
        .btn-logout:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Bienvenido a la Aplicación</h2>
        @auth
            <p>¡Hola, {{ Auth::user()->name }}!</p>
            <a href="{{ route('solicitudes.index') }}" class="btn">Ir a Solicitudes</a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">ñ
                @csrf
                <button type="submit" class="btn btn-logout">Cerrar Sesión</button>
            </form>
        @else
            <p>Inicia sesión para continuar:</p>
            <a href="{{ route('login') }}" class="btn">Iniciar Sesión</a>
        @endauth
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
