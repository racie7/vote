<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectionsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('elections', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('period');
			$table->boolean('is_completed')->default(false);
			$table->boolean('is_upcoming')->default(false);
			$table->unsignedBigInteger('election_type_id');
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
		Schema::dropIfExists('elections');
	}
}
