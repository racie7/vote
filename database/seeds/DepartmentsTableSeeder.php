<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		// Departments available
		$departments = [
			'Faculty', 'Hospitality', 'Finance', 'Supply Chain Management', 'Administration', 'Maintenance',
			'Grounds', 'Transport', 'Customer Care', 'Security', 'Wardens', 'HR', 'Registry', 'ICT',
			'Office Administrators', 'clerical staff', 'support staff', 'Corporate', 'Non-teaching support',
			'Research assistants', 'librarians', 'office assistants',
			'admissions', 'Business Development', 'sports',
		];

		// Loop through the departments while inserting them to the DB
		foreach ($departments as $department) {
			DB::table('departments')->insert([
				'name' => ucwords($department),
				'created_at' => now(),
				'updated_at' => now(),
				'team_id' => rand(1, 8),
			]);
		}
	}
}
