<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function todos()
    {
        return $this->hasMany(Todo::class);
    }
}
