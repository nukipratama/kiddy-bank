<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title = ['Menabung itu apa sih?', 'Pentingnya menyisihkan uang jajan', 'Apa itu Mata Uang?', 'Sejarah Mata Uang Rupiah'];
        $pic_url = ['illustration_credit card.png', 'illustration_3 kids.png', 'illustration_school.png', 'illustration_treasure.png'];
        $article = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).";

        $data = [];
        foreach ($title as $key => $value) {
            array_push($data, [
                'title' => $value,
                'pic_url' => 'img/illustration/' . $pic_url[$key],
                'article' => $article,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        Task::insert($data);
    }
}
