<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditBooksTable5 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
          $table->text('description')->nullable(true)->change();
          $table->text('author')->nullable(true)->change();
          $table->text('date_published')->nullable(true)->change();
          $table->decimal('price', 14, 0)->nullable();
          $table->integer('subject_id')->unsigned();
          $table->integer('grade_id')->unsigned();
          $table->integer('sub_subject_id')->unsigned();
          $table->foreign('subject_id')
                ->references('id')
                ->on('subjects');
          $table->foreign('grade_id')
                ->references('id')
                ->on('grades');
          $table->foreign('sub_subject_id')
                ->references('id')
                ->on('sub_subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            //
        });
    }
}
