<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topup extends Model
{
    use HasFactory;
    protected $table = 'topup';
    protected $fillable = ['user_id', 'amount', 'status', 'payment_proof'];
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
