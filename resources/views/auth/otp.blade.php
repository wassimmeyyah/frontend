<body>
<div class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow-lg p-4" style="width: 400px;">
        <h2 class="text-center mb-4">Vérification OTP</h2>
        <form method="POST" action="{{ route('otp') }}">
            @csrf
            <!-- Champ caché pour envoyer le username -->
            <input type="hidden" name="username" value="{{ session('username') }}">

            <div class="mb-3">
                <label for="otp" class="form-label">Code OTP</label>
                <input type="text" id="otp" name="otp" class="form-control" placeholder="Entrez votre code OTP" required>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p class="mb-0">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <button type="submit" class="btn btn-primary w-100">Vérifier</button>
        </form>
    </div>
</div>
</body>
