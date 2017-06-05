<?php

use Illuminate\Database\Seeder;
use database\seeds\NewsSeeder;
use database\seeds\TechSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('NewsSeeder');
        $this->call('TechSeeder');
        $this->call('QuestionSeeder');
        $this->call('SolutionSeeder');
        // $this->call(NewsSeeder::class);
    }
}
