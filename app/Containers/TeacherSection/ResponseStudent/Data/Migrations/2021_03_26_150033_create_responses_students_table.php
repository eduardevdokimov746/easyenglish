<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResponsesStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('responses_students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('zadanie_id');
            $table->unsignedBigInteger('user_id');
            $table->text('comment')->nullable();
            $table->timestamps();

            $table->foreign('zadanie_id')
                ->on('zadanies')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('responses_students');
    }
}
