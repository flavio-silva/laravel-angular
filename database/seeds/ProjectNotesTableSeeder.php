<?php

use Illuminate\Database\Seeder;
use CodeProject\Entities\ProjectNote;

class ProjectNotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectNote::truncate();
        factory(ProjectNote::class)->create([
            'note' => 'Note Test',
            'title' =>  'Lorem ipsum',
            'project_id' => 1
        ]);
        
        factory(ProjectNote::class, 50)->create();
    }
}
