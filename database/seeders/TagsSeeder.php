<?php

namespace Database\Seeders;

use App\Models\Tags;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tags::insert([
            'tag_id' =>  Uuid::Uuid4(),
            'name' => 'Work',
            'color' => '#7C3AED'
        ]);
        Tags::insert([
            'tag_id' =>  Uuid::uuid4(),
            'name' => 'UX Research',
            'color' => '#16A34A'
        ]);
        Tags::insert([
            'tag_id' =>  Uuid::uuid4(),
            'name' => 'Inspiration',
            'color' => '#CA8A04'
        ]);
        Tags::insert([
            'tag_id' =>  Uuid::uuid4(),
            'name' => 'Meeting',
            'color' => '#DC2626'
        ]);
        Tags::insert([
            'tag_id' =>  Uuid::uuid4(),
            'name' => 'Design team',
            'color' => '#2563EB'
        ]);
    }
}
