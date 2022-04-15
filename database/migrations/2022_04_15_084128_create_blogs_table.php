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
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('blog_category_id');
            $table->enum('is_deleted', ['0', '1'])->default('0');
            $table->enum('status', ['0', '1'])->default('0');
            $table->timestamps();
            $table->foreign('author_id')->references('id')->on('authors');
            $table->foreign('blog_category_id')->references('id')->on('blog_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
};
