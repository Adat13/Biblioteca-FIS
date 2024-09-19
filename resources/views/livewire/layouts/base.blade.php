<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Pagina' }}</title>

    {{-- bootstrap style --}}
    <!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"-->
    <link rel="shortcut icon" type="image/x-icon" href="https://uncp.edu.pe/wp-content/uploads/2019/10/favicon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background: #082368;
        }
    </style>
    @livewireStyles
</head>

<body>
    @auth
    <!-- Si esta autentificado -->
        {{ $slot }}
    @else
    <!-- Si no esta autentificado -->
        <a class="nav-link" href="{{ route('login') }}">
            <h4>Bienvenido Administrador</h4>
            <img src="{{ asset('imagenes/admin2.png') }}" alt="Logo Administrador"
                style="height: 67px; margin-right: 50px;">
        </a>
    @endauth
    {{-- bootstrap scrips --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
    @stack('scripts')
    @livewireScripts
</body>

</html>
