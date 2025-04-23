<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    public function sol·licitant()
    {
        return $this->belongsTo(User::class, 'user_solicitant_id');
    }

    public function sol·licitat()
    {
        return $this->belongsTo(User::class, 'user_solicitat_id');
    }
}
