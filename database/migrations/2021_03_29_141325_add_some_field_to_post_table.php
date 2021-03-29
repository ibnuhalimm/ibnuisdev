<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeFieldToPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post', function (Blueprint $table) {
            $table->text('image_credits')->nullable()->after('gbr');
            $table->text('brief_text')->after('image_credits')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post', function (Blueprint $table) {
            $table->dropColumn('image_credits');
        });
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('brief_text');
        });
    }
}
