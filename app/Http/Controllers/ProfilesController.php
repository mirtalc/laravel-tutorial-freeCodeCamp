<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        return view('profiles/index', compact('user', 'follows'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles/edit', compact('user'));
    }

    public function update(User $user)
    {
        // 1. Comprovem que l'operació està autoritzada
        $this->authorize('update', $user->profile);

        // 2. Validem dades del formulari i les guardem a $data
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '', //required no, però igual estaria bé posar image
        ]);

        // 3. Si l'usuari ha pujat una imatge, la guardem redimensionada
        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        // 4. Guardem els canvis al perfil de la BBDD, substituïnt la imatge de $data
        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

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
