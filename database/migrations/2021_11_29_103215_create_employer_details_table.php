<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployerDetailsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('employer_details', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('company_logo');
			$table->string('company_name');
			$table->integer('state_id');
			$table->integer('city_id');
			$table->string('email')->unique();
			$table->string('mobile_number')->unique();
			$table->string('company_phone');
			$table->string('alternate_number');
			$table->string('company_address');
			$table->text('about_company');
			$table->integer('job_categories_id');
			$table->integer('company_established_year');
			$table->integer('team_member');
			$table->string('company_website');
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
		Schema::dropIfExists('employer_details');
	}
}
