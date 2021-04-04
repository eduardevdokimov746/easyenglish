<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSectionFiles extends Migration
{
    public function up()
    {
        Schema::create('section_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('section_id');
            $table->string('title');
            $table->string('hash');
            $table->string('size');
            $table->string('ext')->default('none');
            $table->timestamps();

            $table->foreign('section_id')
                ->on('sections')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('section_files');
    }
}
