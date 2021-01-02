<?php

namespace Database\Seeders;

use App\Models\Mission;
use Illuminate\Database\Seeder;

class MissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amount = [2000, 3000, 5000, 10000];
        $data = [];
        for ($i = 0; $i < count($amount); $i++) {
            array_push($data, [
                'title' => 'Menyisihkan uang jajan Rp' . $amount[$i] . ', lalu ditabung',
                'amount' => $amount[$i],
                'reward' => $amount[$i] / 100,
                'unit' => 'Point',
                'icon' => 'img/illustration/illustration_gift.png',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        Mission::insert($data);
    }
}
