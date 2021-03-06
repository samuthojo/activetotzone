<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_subjects', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('subject_id')->unsigned();
          $table->string('name');
          $table->text('description')->nullable();
          $table->timestamps();
          $table->softDeletes();
          $table->foreign('subject_id')
                ->references('id')
                ->on('subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_subjects');
    }
}
