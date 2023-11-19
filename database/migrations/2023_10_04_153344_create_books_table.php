<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title_book');
            $table->string('original_price');
            $table->string('price');
            $table->string('book_image');
            $table->string('description');
            $table->string('publish_house');
            $table->string('quantity');
            $table->bigInteger('id_review')->unsigned()->nullable();
            $table->bigInteger('id_author')->unsigned();
            $table->bigInteger('id_cate')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
