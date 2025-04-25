<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $fillable = [
        'user_id',
        'ruta'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
