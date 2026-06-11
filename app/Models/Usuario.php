<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'nome',
        'email',
        'password',
        'tipo_usuario_id',
    ];

    protected $hidden = [
        'password',
    ];
}