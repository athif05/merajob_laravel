<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CandidateWorkExperience extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('candidate_work_experience', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('organization_name');
			$table->string('designation_name');
			$table->string('date_from');
			$table->string('date_to');
			$table->enum('is_deleted', ['0', '1'])->default('0');
			$table->enum('status', ['0', '1'])->default('0');
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
