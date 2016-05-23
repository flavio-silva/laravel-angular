<?php

use Illuminate\Database\Seeder;
use CodeProject\Entities\OAuthClient;

class OAuthClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OAuthClient::truncate();

        factory(OAuthClient::class)->create([
            'id' => 'projectapp',
            'secret' => 'secret',
            'name' => 'CodeProject'
        ]);
    }
}
