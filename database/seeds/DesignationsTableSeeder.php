<?php

use Illuminate\Database\Seeder;

class DesignationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $designations = [
           'Deputy Directors - Learning Development',
           'Administration Officer II',
           'Support Staff I',
           'Senior Principal Lecturer',
            'Campus Directors',
            'Support Staff Supervisor',
            'Senior Support Staff Supervisor',
           'Driver III',
            'Senior Administration Officer',
           'Driver II',
           'Driver I'
        ];
        
        foreach($designations as $designation) {
            \DB::table('designations')->insert([
                'name' => $designation,
            
            ]);
        }
    }
}
