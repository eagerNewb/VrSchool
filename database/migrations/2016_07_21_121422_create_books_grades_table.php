<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('book_grade', function (Blueprint $table) {
            $table->integer('book_id')->unsigned();
            $table->integer('grade_id')->unsigned();

            $table->foreign('book_id')
                ->references('id')
                ->on('books')
                ->onDelete('cascade');

            $table->foreign('grade_id')
                ->references('id')
                ->on('grades')
                ->onDelete('cascade');

            $table->primary(['book_id', 'grade_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
