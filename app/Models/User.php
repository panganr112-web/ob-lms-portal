<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public $timestamps = false; 
    protected $table = 'users';
    protected $fillable = ['username', 'password', 'role'];

    public function getAuthIdentifierName() {
        return 'username';
    }
}