<?php

namespace Database\Seeders;

use App\Models\Lists;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class ListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lists::insert([
            'list_id' =>  Uuid::uuid4(),
            'name' => 'Work',
            'icon' => 'briefcase-outline'
        ]);
        Lists::insert([
            'list_id' =>  Uuid::uuid4(),
            'name' => 'Freelance',
            'icon' => 'cash-outline'
        ]);
        Lists::insert([
            'list_id' =>  Uuid::uuid4(),
            'name' => 'Workout',
            'icon' => 'flash-outline'
        ]);
        Lists::insert([
            'list_id' =>  Uuid::uuid4(),
            'name' => 'Learning',
            'icon' => 'globe-outline'
        ]);
        Lists::insert([
            'list_id' =>  Uuid::uuid4(),
            'name' => 'Reading',
            'icon' => 'book-outline'
        ]);
    }
}
