<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalanceHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'addition',
        'expense',
        'title',
        'balance_type',
        'icon',
    ];
}
