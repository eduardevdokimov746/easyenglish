<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersInfoTables extends Migration
{
    public function up()
    {
        Schema::create('users_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('date_of_birth')->nullable();
            $table->tinyInteger('is_visible_date_of_birth')->default(0);
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('number_phone')->nullable();
            $table->tinyInteger('is_first_login')->default(1);
            $table->dateTime('datetime_first_login')->nullable();
            $table->dateTime('datetime_last_login')->nullable();
            $table->text('description')->nullable();

            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users_info');
    }
}
