<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkingDaysTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('working_days', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('name');
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
		Schema::dropIfExists('working_days');
	}
}
