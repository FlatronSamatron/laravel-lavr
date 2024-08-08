<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Tags extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = ['Sales' ,'New', 'Damaged', 'Tuning', 'Other'];
        foreach ($tags as $tag) {
            Tag::create(['title' => $tag]);
        }
    }
}
