<?php

namespace Database\Seeders;

use App\Models\Tasks;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tasks::insert([
            'task_id' =>  Uuid::uuid4(),
            'list_id' => '22fcdd04-5ef6-482b-b03c-27231f7cc7aa',
            'tag_id' => '1b9f4625-e8c8-4812-b016-815db934a76e',
            'title' => 'Gym Session Week 3',
            'detail_task' => 'Day for biceps, legs, and back. The target is 20 for biceps, 10 or legs, and 15 for back.',
            'status' => '0',
        ]);
        Tasks::insert([
            'task_id' =>  Uuid::uuid4(),
            'list_id' => '22fcdd04-5ef6-482b-b03c-27231f7cc7aa',
            'tag_id' => '1b9f4625-e8c8-4812-b016-815db934a76e',
            'title' => 'Advanced Piano Class',
            'detail_task' => 'Day for biceps, legs, and back. The target is 20 for biceps, 10 or legs, and 15 for back.',
            'status' => '1',
        ]);
        Tasks::insert([
            'task_id' =>  Uuid::uuid4(),
            'list_id' => '22fcdd04-5ef6-482b-b03c-27231f7cc7aa',
            'tag_id' => '1b9f4625-e8c8-4812-b016-815db934a76e',
            'title' => 'Product Design Webinar',
            'detail_task' => 'Day for biceps, legs, and back. The target is 20 for biceps, 10 or legs, and 15 for back.',
            'status' => '2',
        ]);
    }
}
