<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class admin extends Authenticable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'is_admin',
    ];

    public function isAdmin()
    {
        return $this->is_admin;
    }
}
