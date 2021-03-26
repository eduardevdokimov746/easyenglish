<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentsGroupTable extends Migration
{
    public function up()
    {
        Schema::create('students_group', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('students_group');
    }
}
