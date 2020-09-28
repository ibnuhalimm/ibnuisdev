<?php

use App\Section;
use Illuminate\Database\Seeder;

class SectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->truncate();

        $data = [
            [
                'section' => 'top',
                'description' => "I'm Fullstack Web Developer with robust problem-solving skills and proven experience in creating and designing high quality software.",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ],
            [
                'section' => 'portfolio',
                'description' => "List of projects I've worked on",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ],
            [
                'section' => 'skills',
                'description' => "Keep learning and growing up",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ],
            [
                'section' => 'contact',
                'description' => "Just feel free to reaching me out",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ],
        ];

        Section::insert($data);
    }
}
