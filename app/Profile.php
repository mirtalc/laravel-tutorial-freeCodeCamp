<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];


    /**
     * Retorna la imatge del perfil (si no hi ha, una per defecte)
     */
    public function profileImage()
    {
        $defaultImage = 'profile/gRmqQ13mzs8I7VH4798H6OXrwD5KrISSLuGbAvBp.jpeg';

        $imagePath = ($this->image) ? $this->image : $defaultImage;

        return '/storage/' . $imagePath;
    }


    /**
     * Relationship per a l'usuari
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
