<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChatUsersTable extends Migration
{
    public function up()
    {
        Schema::create('chat_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('chat_id');
            $table->smallInteger('count_notice')->default(0);

            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->foreign('chat_id')
                ->on('chats')
                ->references('id')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });
    }

    public function down()
    {
        Schema::dropIfExists('chat_users');
    }
}
