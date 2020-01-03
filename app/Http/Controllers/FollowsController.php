<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    /**
     * Si no està autenticat quan apreta Follows, dóna error 401 (Unauthorized)
     * Açò activarà el .catch() de axios.post del FollowButton.vue
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(User $user)
    {
        // toggle(): si estava associat, desassocia (i viceversa)
        // A l'usuari autentificat, toggle del perfil de l'usuari que estava visitant
        // (des del qual ha apretat el FollowButton)
        return auth()->user()->following()->toggle($user->profile);
    }
}
