<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResponsesTeachersFilesTable extends Migration
{
    public function up()
    {
        Schema::create('responses_teachers_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('response_teacher_id');
            $table->string('title');
            $table->string('hash');
            $table->string('size');
            $table->string('ext')->default('none');
            $table->timestamps();

            $table->foreign('response_teacher_id')
                ->on('responses_teachers')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('responses_teachers_files');
    }
}
