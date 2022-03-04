<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookBorrowingDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_borrowing_detail', function (Blueprint $table) {
            $table->bigIncrements('id_book_borrowing_detail');
            $table->unsignedBigInteger('id_book_borrowing');
            $table->unsignedBigInteger('id_book');
            $table->integer('quantity');

            $table->foreign('id_book_borrowing')->references('id_book_borrowing')->on('book_borrowing');
            $table->foreign('id_book')->references('id_book')->on('book');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_borrowing_detail');
    }
}