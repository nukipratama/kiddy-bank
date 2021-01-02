<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Balance;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'Admin KiddyBank',
            'username' => 'kbadmin',
            'password' => Hash::make('kbadmin'),
            'parent_phone' => '081234567890'
        ];
        $name = explode(" ", $data['name']);
        $firstName = current($name);
        $lastName = str_replace(current($name) . " ", '', $data['name']);
        $user = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'parent_phone' => $data['parent_phone'],
            'password' => $data['password'],
        ]);
        $profile = Profile::create([
            'user_id' => $user->id,
            'first_name' => $firstName,
            'last_name' => $lastName,
        ]);
        $balance = Balance::create(['user_id' => $user->id,]);
        $admin = Admin::create(['user_id' => $user->id]);
    }
}
