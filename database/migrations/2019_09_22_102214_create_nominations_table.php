<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNominationsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('nominations', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('type');
			$table->longText('results');
			$table->unsignedBigInteger('nominee');
			$table->unsignedBigInteger('nominated_by');
			$table->unsignedBigInteger('election_id');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('nominations');
	}
}
