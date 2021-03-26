<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSectionLinks extends Migration
{
    public function up()
    {
        Schema::create('section_links', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('section_id');
            $table->string('title');
            $table->string('url');
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
        Schema::dropIfExists('section_links');
    }
}
