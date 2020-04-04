<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float("prev_longitude");
            $table->float("prev_latitude");
            $table->float("new_longitude");
            $table->float("new_latitude");
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location_logs');
    }
}
