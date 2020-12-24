<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $with = ['admin', 'profile', 'balance'];
    public function admin()
    {
        return $this->hasOne(Admin::class, 'user_id', 'id');
    }
    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id', 'id');
    }
    public function balance()
    {
        return $this->hasOne(Balance::class, 'user_id', 'id');
    }
    protected $fillable = [
        'name',
        'username',
        'password',
        'parent_phone',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
