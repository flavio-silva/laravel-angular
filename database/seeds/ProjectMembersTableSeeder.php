<?php

use Illuminate\Database\Seeder;

use CodeProject\Entities\ProjectMember;

class ProjectMembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectMember::truncate();
        factory(ProjectMember::class, 10)->create();
    }
}
