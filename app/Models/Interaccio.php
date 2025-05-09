<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interaccio extends Model
{
    use HasFactory;

    protected $table = 'interaccions';

    protected $fillable = [
        'usuari_id',
        'interactuat_id',
        'tipus',
    ];

    public function usuari()
    {
        return $this->belongsTo(User::class, 'usuari_id');
    }

    public function interactuat()
    {
        return $this->belongsTo(User::class, 'interactuat_id');
    }
}
