<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'reward', 'price', 'unit', 'description', 'code', 'pic_url', 'claim_user_id'
    ];
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'claim_user_id');
    }
}
