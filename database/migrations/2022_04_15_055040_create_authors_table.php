<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile_number')->unique();
            $table->string('alternate_number')->nullable();
            $table->string('address');
            $table->unsignedBigInteger('blog_category_id');
            $table->enum('is_deleted', ['0', '1'])->default('0');
            $table->enum('status', ['0', '1'])->default('0');
            $table->timestamps();
            //$table->foreign('blog_category_id')->references('id')->on('blog_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authors');
    }
};
