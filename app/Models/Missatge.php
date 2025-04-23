<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Missatge extends Model
{
    public function remitent()
    {
        return $this->belongsTo(User::class, 'user_remitent_id');
    }

    public function destinatari()
    {
        return $this->belongsTo(User::class, 'user_destinatari_id');
    }
}
