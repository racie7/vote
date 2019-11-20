<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('users', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('staff_no')->unique();
			$table->unsignedBigInteger('national_id')->unique();
			$table->timestamp('email_verified_at')->nullable();
			$table->string('password');
//			$table->text('job_description');
            $table->string('designation');
//            $table->string('job_group');
            $table->date('appointed_at');
            $table->char('gender', 10);
            $table->boolean('can_view_results')->default(false);
			$table->unsignedBigInteger('department_id');
			$table->unsignedBigInteger('campus_id');
			$table->rememberToken();
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
		Schema::dropIfExists('users');
	}
}
