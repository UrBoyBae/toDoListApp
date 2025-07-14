<?php

namespace Database\Seeders;

use App\Models\Habits;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class HabitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Habits::insert([
            'activity_id' =>  Uuid::uuid4(),
            'title' => 'Observing',
            'photo' => 'observer.jpg',
            'start_time' => '07:00:00',
            'end_time' => '07:30:00',
            'date' => '2025-07-14',
        ]);
        Habits::insert([
            'activity_id' =>  Uuid::uuid4(),
            'title' => 'Cooking',
            'photo' => 'cooking.jpg',
            'start_time' => '09:00:00',
            'end_time' => '10:00:00',
            'date' => '2025-07-14',
        ]);
        Habits::insert([
            'activity_id' =>  Uuid::uuid4(),
            'title' => 'Self Caring',
            'photo' => 'selfcaring.jpg',
            'start_time' => '11:00:00',
            'end_time' => '12:00:00',
            'date' => '2025-07-14',
        ]);
        Habits::insert([
            'activity_id' =>  Uuid::uuid4(),
            'title' => 'Singing',
            'photo' => 'singing.jpg',
            'start_time' => '14:00:00',
            'end_time' => '14:30:00',
            'date' => '2025-07-14',
        ]);
        Habits::insert([
            'activity_id' =>  Uuid::uuid4(),
            'title' => 'Reading',
            'photo' => 'reading.jpg',
            'start_time' => '16:00:00',
            'end_time' => '17:30:00',
            'date' => '2025-07-14',
        ]);
    }
}
