<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMission extends Model
{
    use HasFactory;
    protected $table = 'user_mission';
    protected $fillable = ['user_id', 'mission_id', 'status'];
}
