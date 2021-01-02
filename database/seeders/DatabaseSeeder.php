<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MissionSeeder::class);
        $this->call(TaskSeeder::class);
        $this->call(UserTaskSeeder::class);
        $this->call(VoucherSeeder::class);
    }
}
