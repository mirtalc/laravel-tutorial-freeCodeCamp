<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('posts/create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);

        // Guarda la imatge i a més retorna la ruta.
        // Ojo: Per a que siga accessible desde fora s'ha de fer un link a /public ==> php artisan storage:link
        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save(); //save de Image de Intervention.

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(\App\Post $post)
    {
        return view('posts/show', compact('post'));

        /*
        Amb user ho teníem així (rebent un paràmetre normal, sense especificar la classe)
        i sense compact(). Compact accepta també vàrios paràmetres, és com l'array d'ací;

        $user = User::findOrFail($userId);

        return view('profiles/index', [
            'user' => $user,
        ]);
        */
    }
}
