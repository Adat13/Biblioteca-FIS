<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/registroLibro.css') }}">
</head>

<body>
    <div class="form-container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('registrarLibro') }}" method="POST">
            @csrf
            <input type="text" name="titulo" placeholder="Título" required>
            <input type="text" name="autor" placeholder="Autor" required>
            <input type="number" name="año" placeholder="Año" required>
            <input type="text" name="editorial" placeholder="Editorial" required>
            <input type="text" name="edición" placeholder="Edición" required>
            <input type="text" name="código" placeholder="Código" required>
            <input type="number" name="ejemplares" placeholder="Número de copias" required>
            <button type="submit">Registrar libro</button>
        </form>
        <a href="{{ route('cancelarRegistro') }}" class="cancel">Cancelar</a>
    </div>
</body>

</html>
