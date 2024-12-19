<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OtpController extends Controller
{
    // Affiche le formulaire OTP
    public function showOtpForm()
    {
        return view('auth.otp');
    }

    // Vérifie l'OTP via l'API
    public function verifyOtp(Request $request)
    {
        // Validation du champ OTP
        $validatedData = $request->validate([
            'username' => 'required|string',
            'otp' => 'required|string',
        ]);
        

        // Préparation des données pour l'API
        $payload = [
            'username' => $validatedData['username'],
            'otp' => $validatedData['otp'],
        ];
        

        // Envoi de la requête à l'API
        $response = Http::post('http://146.19.168.104:8000/verify_otp/', $payload);

        if ($response->successful()) {
            // Si l'OTP est valide
            return redirect()->route('dashboard')->with('success', 'Authentification réussie.');
        } else {
            // Gestion des erreurs OTP
            return back()->withErrors([
                'error' => 'OTP invalide : ' . $response->body(),
            ]);
        }
    }
}
