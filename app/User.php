<?php

namespace App;

use App\Mail\NewUserWelcomeMail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Funció que s'activa cada volta que es crea un usuari.
     * Volem que automàticament, se li cree un perfil associat.
     */
    public static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            $user->profile()->create([
                // el $user_id el crea per defecte, perquè hem creat el perfil desde la relació
                // el title és nullable, però posem algo per defecte
                'title' => $user->username,
            ]);

            // en un projecte real, no enviaria així correus des d'un Model
            Mail::to($user->email)->send(new NewUserWelcomeMail());
        });
    }

    /**
     * Relació 1-n amb Post
     */
    public function posts()
    {
        return $this->hasMany(Post::class)->orderBy('created_at', 'DESC');
    }

    /**
     * Relació n-n amb Profile
     */
    public function following()
    {
        return $this->belongsToMany(Profile::class);
    }

    /**
     * Relació 1-1 amb Profile
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
