<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            // Primeiro, adiciona a coluna user_id
            $table->unsignedBigInteger('user_id'); // Cria a coluna user_id como unsigned

            // Em seguida, adiciona a chave estrangeira
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            // Primeiro, remove a chave estrangeira
            $table->dropForeign(['user_id']);

            // Em seguida, remove a coluna user_id
            $table->dropColumn('user_id');
        });
    }
}
