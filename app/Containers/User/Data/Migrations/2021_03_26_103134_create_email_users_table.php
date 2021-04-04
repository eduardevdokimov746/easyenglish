<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmailUsersTable extends Migration
{
    public function up()
    {
        Schema::create('email_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('email')->unique();
            $table->tinyInteger('is_visible')->default(1);
            $table->tinyInteger('is_confirmation')->default(0);
            $table->string('confirmation_code')->nullable();

            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('email_users');
    }
}
