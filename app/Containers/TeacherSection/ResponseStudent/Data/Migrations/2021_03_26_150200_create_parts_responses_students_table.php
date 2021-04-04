<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartsResponsesStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('parts_responses_students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('response_student_id');
            $table->unsignedBigInteger('part_zadanie_id');
            $table->text('data');
            $table->timestamps();

            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('response_student_id')
                ->on('responses_students')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('part_zadanie_id')
                ->on('parts_zadanies')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('parts_responses_students');
    }
}
