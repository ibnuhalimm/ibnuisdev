<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSosmedUrlToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('github', 100)->after('username')->nullable();
            $table->string('twitter', 100)->after('github')->nullable();
            $table->string('linkedin', 100)->after('twitter')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('github');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('twitter');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('linkedin');
        });
    }
}
