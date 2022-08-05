<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }

    public function store(Request $request)
    {
        // Validation du format des données
        $validated = $request->validate([
            'identifiant' => 'required|min:3|max:255',
            'email' => 'required|email',
            'password' => 'required|min:4|confirmed',
        ]);

        // Création de l'utilisateur
        User::create([
            'name' => $request->identifiant,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // Retour à la page d'inscription avec un message de success
        return view('auth/register', ['success' => 'Compte créé avec success']);
    }

    public function login()
    {
        return view('auth/login');
    }

    public function verify(Request $request)
    {
        // Vérifier l'existence d'un utilisateur ayant pour adresse mail, celle passée via le formulaire
        $user = User::where('email', $request->email)->first();
        if ($user !== null) {
            if($user->password === $request->password) {
                return view('auth/login', ['success' => 'Connexion établie']);
            }
            else return view('auth/login', ['error' => 'Mot de passe incorrect']);
        }
        return view('auth/login', ['error' => 'Utilisateur non existant']);
    }
}
