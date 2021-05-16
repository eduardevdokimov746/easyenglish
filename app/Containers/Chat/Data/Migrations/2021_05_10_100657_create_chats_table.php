<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChatsTable extends Migration
{
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {

            $table->id();
            $table->enum('type', ['group', 'dialog']);
            $table->string('title')->nullable();
            $table->string('hash')->unique();

        });
    }

    public function down()
    {
        Schema::dropIfExists('chats');
    }
}
