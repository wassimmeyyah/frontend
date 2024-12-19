<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    // Affiche le formulaire de connexion
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Gère la connexion via l'API
    public function login(Request $request)
    {
        // Validation des champs
        $validatedData = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Préparation des données pour l'API
        $payload = [
            'username' => $validatedData['username'],
            'password' => $validatedData['password'],
        ];

        // Envoi de la requête à l'API
        $response = Http::post('http://146.19.168.104:8000/login/', $payload);

        if ($response->successful()) {
            // Si l'API retourne une réponse réussie
            $data = $response->json();

            // Stocker le username dans la session
            session(['username' => $validatedData['username']]);

            // Redirection vers le formulaire OTP
            return redirect()->route('otp')->with('success', 'Connexion réussie.');
        } else {
            // Gestion des erreurs retournées par l'API
            return back()->withErrors([
                'error' => 'Connexion échouée : ' . $response->body(),
            ]);
        }
    }
}
