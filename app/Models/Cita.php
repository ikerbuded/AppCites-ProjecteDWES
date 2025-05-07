<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{

    protected $table = 'cites';

    protected $fillable = [
        'user_solicitant_id',
        'user_solicitat_id',
        'estat',
    ];

    public function remitent()
    {
        return $this->belongsTo(User::class, 'user_solicitant_id');
    }

    public function destinatari()
    {
        return $this->belongsTo(User::class, 'user_solicitat_id');
    }
}
