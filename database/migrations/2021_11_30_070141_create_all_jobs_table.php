<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllJobsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('all_jobs', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('job_title')->nullable();
			$table->string('salary')->nullable();
			$table->integer('no_of_opening')->nullable();
			$table->integer('job_location_id')->nullable();
			$table->integer('state_id')->nullable();
			$table->integer('city_id')->nullable();
			$table->integer('types_of_job_id')->nullable();
			$table->string('working_days')->nullable();
			$table->string('working_hours')->nullable();
			$table->string('experience_required')->nullable();
			$table->string('min_experience_required')->nullable();
			$table->string('max_experience_required')->nullable();
			$table->string('ctc')->nullable();
			$table->string('gender')->nullable();
			$table->string('candidate_requirements')->nullable();
			$table->string('skills')->nullable();
			$table->string('english_required')->nullable();
			$table->string('interview_information_company_name')->nullable();
			$table->string('interview_information_hr_name')->nullable();
			$table->string('interview_information_hr_number')->nullable();
			$table->string('interview_information_hr_email')->nullable();
			$table->integer('job_address_city')->nullable();
			$table->integer('job_address_state')->nullable();
			$table->string('job_address_flat_address')->nullable();
			$table->integer('interview_address_city')->nullable();
			$table->integer('interview_address_state')->nullable();
			$table->string('interview_address_full_address')->nullable();
			$table->string('candidate_fee_charged')->nullable();
			$table->string('candidate_fee_amount')->nullable();
			$table->string('candidate_fee_reasons')->nullable();
			$table->string('candidate_fee_other_reasons')->nullable();
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
		Schema::dropIfExists('all_jobs');
	}
}
