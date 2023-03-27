<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
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
        DB::table('tasks')->insert([
            'title' => Str::random(2).' is title',
            'description' => Str::random(2).' is description',
            'type' => intRandomOrder()->limit(2)->get,
            'status' => intRandomOrder()->limit(2)->get,
            ''
        ]);
    }
}
