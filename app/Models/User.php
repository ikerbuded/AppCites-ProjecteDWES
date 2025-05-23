<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'sexe',
        'data_naixement',
        'color_cabell',
        'color_ulls',
        'imatge'
    ];

    public function preferencia()
    {
        return $this->hasOne(Preferencia::class);
    }

    public function missatgesEnviats()
    {
        return $this->hasMany(Missatge::class, 'user_remitent_id');
    }

    public function missatgesRebuts()
    {
        return $this->hasMany(Missatge::class, 'user_destinatari_id');
    }

    public function citesSolicitades()
    {
        return $this->hasMany(Cita::class, 'user_solicitant_id');
    }

    public function citesRebudes()
    {
        return $this->hasMany(Cita::class, 'user_solicitat_id');
    }

    public function fotos()
    {
        return $this->hasMany(Foto::class);
    }

    public function fotoPrincipal()
    {
        return $this->hasOne(Foto::class)->where('principal', true);
    }

    public function interaccionsFetes()
    {
        return $this->hasMany(Interaccio::class, 'usuari_id');
    }

    public function interaccionsRebudes()
    {
        return $this->hasMany(Interaccio::class, 'interactuat_id');
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
