<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResponsesStudentsFilesTable extends Migration
{
    public function up()
    {
        Schema::create('responses_students_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('response_student_id');
            $table->string('title');
            $table->string('hash');
            $table->string('size');
            $table->string('ext')->default('none');
            $table->timestamps();

            $table->foreign('response_student_id')
                ->on('responses_students')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('responses_students_files');
    }
}
