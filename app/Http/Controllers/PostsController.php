<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function create()
    {
        return view('posts/create');
    }

    public function store()
    {
        //dd(request()->all());

        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
            'field-valid-sempre' => '',
        ]);

        /* Quan passem l'array $data, si algún camp no l'especifiquem, l'ignora
        i no el passaria al create().
        Aleshores, si tenim un camp que no requerix validació però volem que es guarde,
        s'especificaria com l'exemple de 'field-valid-sempre' */
        \App\Post::create($data);
    }
}
