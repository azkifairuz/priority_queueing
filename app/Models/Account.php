<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'account';

    protected $fillable = [
        'username', 'password', 'role'
    ];

    protected $hidden = ['password'];
}
