<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - DocEnLigne</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #eef2f7;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Arial', sans-serif;
        }

        .login-card {
            background: #ffffff;
            padding: 3rem;
            border-radius: 1rem;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 450px;
            text-align: center;
        }

        .login-card img {
            width: 120px;
            height: auto;
            margin-bottom: 1.5rem;
        }

        .login-card h1 {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 2rem;
        }

        .btn-primary {
            border-radius: 50px;
            padding: 0.75rem;
            font-size: 1rem;
        }

        .form-control {
            border-radius: 50px;
            padding: 0.75rem 1.5rem;
            font-size: 0.95rem;
        }

        .form-label {
            font-weight: 600;
            color: #555555;
        }

        .text-muted {
            font-size: 0.9rem;
            margin-top: 1.5rem;
        }

        .text-muted a {
            text-decoration: none;
            color: #007bff;
        }

        .text-muted a:hover {
            text-decoration: underline;
        }

        input {
            text-align: center;
        }

        input::placeholder {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="login-card">
        <img src="{{ asset('logo.png') }}" alt="Logo DocEnLigne">
        <h1>Se connecter</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <input type="text" name="username" id="username" class="form-control" placeholder="Nom d'utilisateur" required>
            </div>
            <div class="mb-4">
                <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe" required>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <p class="mb-0">{{ $error }}</p>
                @endforeach
            </div>
            @endif
            <button type="submit" class="btn btn-primary w-100">Se connecter</button>
        </form>
        <p class="text-muted mt-4">
            Pas encore inscrit ? <a href="{{ route('register') }}">Créer un compte</a>
        </p>
    </div>
</body>

</html>