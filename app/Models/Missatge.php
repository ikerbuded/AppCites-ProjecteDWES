<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Missatge extends Model
{
    protected $fillable = [
        'user_remitent_id',
        'user_destinatari_id',
        'assumpte',
        'cos',
        'data_enviament',
        'hora_enviament',
    ];

    public function remitent()
    {
        return $this->belongsTo(User::class, 'user_remitent_id');
    }

    public function destinatari()
    {
        return $this->belongsTo(User::class, 'user_destinatari_id');
    }
}
