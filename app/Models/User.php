<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Idinagdag ito
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable; // Idinagdag ito para gumana ang factory at seeder

    public $timestamps = false; 
    protected $table = 'users';
    
    // Siguraduhin na kasama ang 'email' kung email ang gagamitin mo sa login
    protected $fillable = ['username', 'email', 'password', 'role'];

    public function getAuthIdentifierName() {
        return 'username';
    }
}