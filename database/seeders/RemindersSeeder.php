<?php

namespace Database\Seeders;

use App\Models\Reminders;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class RemindersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reminders::insert([
            'reminder_id' =>  Uuid::uuid4(),
            'task_id' => '59c1efd5-a877-4215-8b1a-ad1dce85658f',
            'remind_at' => Carbon::today()->setTime(15, 0, 0),
            'note' => 'Dona Gym',
        ]);
        Reminders::insert([
            'reminder_id' =>  Uuid::uuid4(),
            'task_id' => '6ccaa8b1-4da3-45be-be0b-4fc9b9fa80d2',
            'remind_at' => Carbon::today()->setTime(19, 0, 0),
            'note' => 'Mrs. Angeline house',
        ]);
        Reminders::insert([
            'reminder_id' =>  Uuid::uuid4(),
            'task_id' => 'e3bc8d03-c2fb-42e3-a685-6d2bd2e69d30',
            'remind_at' => Carbon::today()->setTime(20, 0, 0),
            'note' => 'Online',
        ]);
    }
}
