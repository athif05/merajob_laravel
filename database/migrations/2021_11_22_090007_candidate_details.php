<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CandidateDetails extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('candidate_details', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('mobile_number')->unique();
			$table->string('alternate_number');
			$table->string('permanent_address');
			$table->string('current_address');
			$table->string('job_title');
			$table->string('job_keywords');
			$table->integer('city_id');
			$table->integer('job_categories_id');
			$table->string('job_locations_id');
			$table->string('skills');
			$table->integer('english_required_id');
			$table->enum('working_or_not', ['0', '1'])->default('0');
			$table->enum('is_deleted', ['0', '1'])->default('0');
			$table->enum('status', ['0', '1'])->default('0');
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		//
	}
}
