<?php

use Illuminate\Database\Seeder;

class CampusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $campuses = [
            'Headquarter / Corporate', 'Nairobi', 'Embu', 'Matuga', 'Mombasa', 'Baringo', 'ELDI'
        ];

        // Loop through the campuses while inserting them to the DB
        foreach ($campuses as $campus) {
            DB::table('campuses')->insert([
                'name' => ucwords($campus),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
