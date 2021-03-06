<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTables extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->set('role', ['simple', 'student', 'teacher', 'admin'])->default('simple');
            $table->string('login')->unique();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('otchestvo')->nullable();
            $table->string('password');
            $table->string('avatar')->default('no_image_user.png');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
