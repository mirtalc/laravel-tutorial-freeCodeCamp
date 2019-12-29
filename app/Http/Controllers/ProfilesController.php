<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    // Rep com a argument la variable de la ruta a web.php
    public function index($userId)
    {
        // Obtenim usuari a través de la ID
        $user = User::findOrFail($userId);

        // Cridem a la vista, passant-li array de variables
        return view('profiles/index', [
            'user' => $user,
        ]);
    }
}
