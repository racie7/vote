<?php

use Illuminate\Database\Seeder;

class JobGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       for($i = 3; $i <= 13; $i ++) {
        \DB::table('job_groups')->insert([
            'name' => 'KSG ' . $i,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
       }
       
    }
}
