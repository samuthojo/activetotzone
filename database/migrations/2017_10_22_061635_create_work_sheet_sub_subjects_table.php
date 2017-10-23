<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkSheetSubSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_sheet_sub_subjects', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('work_sheet_subject_id')->unsigned();
          $table->string('name');
          $table->text('description')->nullable();
          $table->timestamps();
          $table->softDeletes();
          $table->foreign('work_sheet_subject_id')
                ->references('id')
                ->on('work_sheet_subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_sheet_sub_subjects');
    }
}
