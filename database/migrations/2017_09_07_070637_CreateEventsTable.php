<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->timestamp('date')->nullable();//when the event is to take place
            $table->string('time', 10);
            $table->string('venue');
            //link to photo gallery if event has passed
            $table->string('link')->default('www.facebook.com/activetotszone/photos/?ref=page_internal');
            $table->timestamps();
            $table->softDeletes(); //Supports soft-deleting of models
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
