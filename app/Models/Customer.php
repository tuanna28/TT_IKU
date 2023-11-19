<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = [
        'id', 'username',    'name',    'email',    'email_verified_at',    'password',    'image',    'date',    'address',    'phone',    'role',    'remember_token',    'created_at',    'updated_at'
    ];
}
