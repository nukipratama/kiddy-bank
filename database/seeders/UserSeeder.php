<?php

namespace Database\Seeders;

use App\Models\Balance;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['User Dummy KiddyBank', 'John Doe', 'Dummy User'];
        $username = ['kbuser', 'johndoe', 'dummyuser'];
        $password = Hash::make('12341234');
        $parent_phone = '081234567890';
        foreach ($name as $i => $value) {
            $fullName = explode(" ", $value);
            $firstName = current($fullName);
            $lastName = str_replace(current($fullName) . " ", '', $value);
            $user = User::create([
                'name' => $value,
                'username' => $username[$i],
                'parent_phone' => $parent_phone,
                'password' => $password,
            ]);
            Profile::create(['user_id' => $user->id, 'first_name' => $firstName, 'last_name' => $lastName]);
            Balance::create(['user_id' => $user->id,]);
        }
    }
}
