<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    // Relationship per a l'usuari
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
