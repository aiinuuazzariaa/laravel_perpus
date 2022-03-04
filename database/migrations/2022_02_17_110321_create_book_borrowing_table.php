<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookBorrowingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_borrowing', function (Blueprint $table) {
            $table->bigIncrements('id_book_borrowing');
            $table->string('id_student');
            $table->date('borrow_date');
            $table->date('return_date');

            $table->foreign('id_student')->references('id_student')->on('student');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_borrowing');
    }
}