<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function testApi()
    {
        // Exemple de requête POST vers l'endpoint /availability/
        $response = Http::post('http://146.19.168.104:8000/availability/', [
            // Paramètres nécessaires pour l'endpoint (s'il y en a)
        ]);

        // Vérifiez si la requête a réussi
        if ($response->successful()) {
            // Récupérez la réponse en format JSON
            $data = $response->json();
            // Affichez ou retournez les données récupérées
            return response()->json($data);
        } else {
            // Si la requête échoue, retournez une erreur
            return response()->json(['error' => 'Request failed'], 400);
        }
    }
}
