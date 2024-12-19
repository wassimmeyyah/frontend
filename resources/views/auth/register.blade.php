<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - DocEnLigne</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #eef2f7;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Arial', sans-serif;
            margin: 0;
        }

        .register-card {
            background: #ffffff;
            padding: 3rem;
            border-radius: 1rem;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 500px;
            /* Une largeur plus grande pour la carte */
            height: 700px;
            /* Hauteur plus grande pour rendre la carte plus longue */
            text-align: center;
            overflow-y: auto;
        }

        .register-card img {
            width: 120px;
            height: auto;
            margin-bottom: 1.5rem;
        }

        .register-card h1 {
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

        input::placeholder {
            text-align: center;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
</head>

<body>
    <div class="register-card">
        <img src="{{ asset('logo.png') }}" alt="Logo DocEnLigne">
        <h1>Créer un compte</h1>

        <!-- Onglets pour choisir entre utilisateur ou médecin -->
        <ul class="nav nav-tabs" id="registerTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="user-tab" data-bs-toggle="tab" href="#user" role="tab" aria-controls="user" aria-selected="true">Compte Utilisateur</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="doctor-tab" data-bs-toggle="tab" href="#doctor" role="tab" aria-controls="doctor" aria-selected="false">Compte Médecin</a>
            </li>
        </ul>

        <div class="tab-content mt-3" id="registerTabContent">
            <!-- Formulaire pour Compte Utilisateur -->
            <div class="tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user-tab">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-4">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nom complet" required>
                    </div>
                    <div class="mb-4">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
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
                    <button type="submit" class="btn btn-primary w-100">S'inscrire</button>
                </form>
            </div>

            <!-- Formulaire pour Compte Médecin -->
            <div class="tab-pane fade" id="doctor" role="tabpanel" aria-labelledby="doctor-tab">
                <form method="POST" action="{{ route('registerDoctor') }}">
                    @csrf
                    <div class="mb-4">
                        <input type="text" name="name" id="nameDoctor" class="form-control" placeholder="Nom complet" required>
                    </div>
                    <div class="mb-4">
                        <input type="email" name="email" id="emailDoctor" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="mb-4">
                        <input type="password" name="password" id="passwordDoctor" class="form-control" placeholder="Mot de passe" required>
                    </div>
                    <div class="mb-4">
                        <input type="text" name="specialty" id="specialty" class="form-control" placeholder="Spécialité" required>
                    </div>
                    <div class="mb-4">
                        <input type="text" name="hospital" id="hospital" class="form-control" placeholder="Hôpital/Clinique" required>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <p class="mb-0">{{ $error }}</p>
                        @endforeach
                    </div>
                    @endif
                    <button type="submit" class="btn btn-primary w-100">S'inscrire en tant que Médecin</button>
                </form>
            </div>
        </div>

        <p class="text-muted mt-4">
            Déjà inscrit ? <a href="{{ route('login') }}">Se connecter</a>
        </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>