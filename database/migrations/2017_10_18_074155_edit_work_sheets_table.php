<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditWorkSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('work_sheets', function (Blueprint $table) {
            $table->decimal('price', 14, 0);
            $table->integer('work_sheet_subject_id')->unsigned();
            $table->integer('work_sheet_grade_id')->unsigned();
            $table->integer('work_sheet_sub_subject_id')->unsigned()->nullable();
            $table->foreign('work_sheet_subject_id')
                  ->references('id')->on('work_sheets');
            $table->foreign('work_sheet_subject_id')
                  ->references('id')->on('work_sheet_subjects');
            $table->foreign('work_sheet_grade_id')
                  ->references('id')->on('work_sheet_grades');
            $table->foreign('work_sheet_sub_subject_id')
                  ->references('id')->on('work_sheet_sub_subjects');              
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('work_sheets', function (Blueprint $table) {
            //
        });
    }
}
