<?php

namespace App\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
=======
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class admin extends Authenticable
{
    use HasFactory, Notifiable;

>>>>>>> 500a0d69a122f449bdbd86f2efe1d6903730d04b
    protected $fillable = [
        'name', 'email', 'password', 'is_admin',
    ];

    public function isAdmin()
    {
        return $this->is_admin;
    }
}
