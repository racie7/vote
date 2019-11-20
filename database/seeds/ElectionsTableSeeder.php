<?php

use Illuminate\Database\Seeder;

class ElectionsTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$electionTypes = [
			'Most Improved Employee Award', 'Values Champion Award',
			'School Employee of the Year Award', 'Campus employee of the Year', 'Team Awards'
		];

		foreach ($electionTypes as $electionType) {
			$election = DB::table('election_types')->insertGetId([
				'type' => $electionType,
				'slug' => \Illuminate\Support\Str::slug($electionType),
				'created_at' => now(),
				'updated_at' => now(),
			]);

			DB::table('elections')->insert([
				'period' => sprintf('%s-%s', now()->addMonth()->monthName, date('Y')),
				'is_completed' => false,
				'election_type_id' => $election,
				'created_at' => now(),
				'updated_at' => now(),
			]);
		}
	}
}
