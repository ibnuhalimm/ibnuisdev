<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniqueVisitorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unique_visitor', function (Blueprint $table) {
            $table->id();
            $table->integer('hit');
            $table->string('ip_address', 64)->index();
            $table->string('device', 8)->index();
            $table->string('os', 15)->index();
            $table->date('date')->index();
            $table->time('time_start');
            $table->time('time_end');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unique_visitor');
    }
}
