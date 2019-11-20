<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('votes', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->unsignedBigInteger('count');
			$table->unsignedBigInteger('election_id');
			$table->unsignedBigInteger('nominee')->nullable();
			$table->unsignedBigInteger('team_id')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('votes');
	}
}
