<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$teams = [
			'Faculty', 'Hospitality', 'Finance &amp; Supply Chain Management', 'Administration', 'HR, Registry &amp; ICT',
			'Office Administrators, clerical staff, support staff', 'Corporate Team', 'Non-teaching support team-',
		];

		// Loop through the teams while inserting them to the DB
		foreach ($teams as $team) {
			DB::table('teams')->insert([
				'name' => ucwords($team),
				'created_at' => now(),
				'updated_at' => now(),
			]);
		}
	}
}
