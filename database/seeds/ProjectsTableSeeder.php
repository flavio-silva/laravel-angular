<?php

use Illuminate\Database\Seeder;
use CodeProject\Entities\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::truncate();
        
        factory(Project::class)->create([
            'owner_id' => 1,
            'client_id' => 1,
            'name' => 'Project Test',
            'description' => 'Lorem ipsum',
            'progress' => rand(1, 100),
            'status' => rand(1, 3),
            'due_date' => '2016-06-06'
       ]);

        factory(Project::class, 10)->create();
    }
}
