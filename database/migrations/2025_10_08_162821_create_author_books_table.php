<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorBooksTable extends Migration
{
    public function up()
    {
        Schema::create('author_books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(('author_id'));
            $table->foreign('author_id')->references('id')->on('authors');
            $table->unsignedBigInteger(('book_id'));
            $table->foreign('book_id')->references('id')->on('books');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('author_books');
    }
}
