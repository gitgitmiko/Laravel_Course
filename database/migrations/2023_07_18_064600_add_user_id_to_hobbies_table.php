<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToHobbiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // php artisan make:migration add_user_id_to_hobbies_table ini untuk nambah kolom di table hobbies
        // php artisan migrate:rollback ini untuk rollback database
        // php artisan migrate:fresh ini untuk drop all table dan migrasikan ulang semua table, resiko semua data hilang
        Schema::table('hobbies', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('user_id') //unsigned means only have positive values
                  ->after('id')
                  ->nullable();
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hobbies', function (Blueprint $table) {
            //
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
}
