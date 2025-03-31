<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Récupérer l'agent via son email
        $agent = DB::table('AGENT')->where('mail_agent', $credentials['email'])->first();

        if (!$agent) {
            return back()->withErrors(['email' => 'Cet email ne correspond à aucun agent.']);
        }

        // Récupérer les identifiants associés à l'agent
        $user = DB::table('IDENTIFIANT_AGENT')->where('id_agent', $agent->id_agent)->first();

        if (!$user || !Hash::check($credentials['password'], $user->mdp_user)) {
            return back()->withErrors(['email' => 'Mot de passe incorrect.']);
        }

        // Définir le rôle (Superviseur = agent, sinon vendeur)
        $role = ($agent->echelon === 'Agent Superviseur') ? 'agent' : 'vendeur';

        // Vérifier si l'utilisateur existe déjà dans la table users de Laravel
        $authUser = \App\Models\User::where('email', $agent->mail_agent)->first();

        if (!$authUser) {
            // Créer un utilisateur dans Laravel Users (Temporaire)
            $authUser = \App\Models\User::create([
                'id' => $user->id_user,
                'name' => $agent->nom . ' ' . $agent->prenom,
                'email' => $agent->mail_agent,
                'password' => $user->mdp_user, // Déjà hashé
            ]);

            // Assigner un rôle (via Spatie)
            $authUser->assignRole($role);
        }

        // Authentifier l'utilisateur via Laravel Auth
        Auth::login($authUser, true);

        return redirect()->route(($role == 'agent') ? 'admin.dashboard' : 'vendeur.dashboard')
            ->with('success', 'Connexion réussie !');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
