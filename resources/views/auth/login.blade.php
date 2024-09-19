<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <style>
        body {
            background-color: #082368;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 110vh;
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
        }

        .container {
            display: flex;
            width: 100%;
            max-width: 950px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .login-section {
            width: 100%;
            background-color: #082368;
            padding: 30px;
            border-top-left-radius: 15px;
            border-bottom-left-radius: 15px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .login-section img.admin-icon {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .login-section h4 {
            text-align: center;
            color: #fff;
            margin-bottom: 20px;
            font-size: 2rem;
        }

        .form-group {
            margin-bottom: 20px;
            width: 100%;
        }

        .form-control {
            width: 120%;
            padding: 23px;
            border-radius: 5px;
            border: 1px solid #ddd;
            background-color: #CAC9C3;
            font-size: 0.75rem;
        }

        .form-control::placeholder {
            color: #888;
        }

        .form-control:focus {
            outline: none;
            border-color: #2c3e50;
            box-shadow: 0 0 8px rgba(44, 62, 80, 0.6);
        }

        .btn-primary,
        .btn-secondary {
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            font-size: 0.875rem;
            cursor: pointer;
            transition: background 0.3s;
            width: 45%;
            margin-top: 60px;
        }

        .btn-primary {
            background: #fff;
            color: #000000;
        }

        .btn-secondary {
            background: #6c757d;
            color: #fff;
        }

        .btn-primary:hover {
            background: #e0e0e0;
        }

        .btn-secondary:hover {
            background: #5a6268;
        }

        .btn-primary:focus,
        .btn-secondary:focus {
            outline: none;
            box-shadow: 0 0 8px rgba(44, 62, 80, 0.6);
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        .image-section {
            width: 100%;
            height: 100vh;
            background: #fff;
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
            position: relative;
        }

        .image-section img {
            max-width: 100%;
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
        }

        .image-section .logo-top-left {
            position: absolute;
            top: 20px;
            left: 20px;
            width: 300px;
            height: auto;
        }

        .image-section .logo-bottom-right {
            position: absolute;
            bottom: 20px;
            right: 20px;
            width: 300px;
            height: auto;
        }

        .image-section .secretary-image {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 65%;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-section">
            <img src="{{ asset('imagenes/admin2-SinFondo.png') }}" alt="Admin Icon" class="admin-icon">
            <h4>LOGIN</h4>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Usuario"
                        required>
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña"
                        required>
                </div>
                <div class="button-group">
                    <button type="submit" class="btn btn-primary">Ingresar</button>
                    <a href="{{ url('/') }}" class="btn btn-secondary">Volver</a>
                </div>
            </form>
        </div>
        <div class="image-section">
            <img src="{{ asset('imagenes/image 6.png') }}" alt="Company Logo" class="logo-top-left">
            <img src="{{ asset('imagenes/image 6.png') }}" alt="Company Logo" class="logo-bottom-right">
            <img src="{{ asset('imagenes/secretaio.png') }}" alt="Secretary" class="secretary-image">
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
