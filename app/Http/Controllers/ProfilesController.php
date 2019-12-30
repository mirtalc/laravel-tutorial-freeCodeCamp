<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        return view('profiles/index', compact('user'));
    }

    public function edit(User $user)
    {
        return view('profiles/edit', compact('user'));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        // En compte de fiar-nos de l'usuari per paràmetre, modifiquem el loguejat
        // Si no, conforme està ara, qualsevol podria editar altres perfils.
        auth()->user()->profile->update($data);

        return redirect("/profile/{$user->id}");
    }
}

/*
Forma anterior de traure els usuaris. Més llarga però més fàcil d'entendre

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

*/
