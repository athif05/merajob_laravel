<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticePeriodTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('notice_periods', function (Blueprint $table) {
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
		Schema::dropIfExists('notice_periods');
	}
}
