<?php

namespace Database\Seeders;

use App\Models\UserTask;
use Illuminate\Database\Seeder;

class UserTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 4; $i++) {
            for ($k = 1; $k < 4; $k++) {
                UserTask::create(['user_id' => $i, 'task_id' => $k, 'status' => true]);
            }
        }
    }
}
