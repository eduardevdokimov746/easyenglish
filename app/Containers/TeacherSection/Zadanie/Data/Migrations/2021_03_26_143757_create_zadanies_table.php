<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZadaniesTable extends Migration
{
    public function up()
    {
        Schema::create('zadanies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('section_id');
            $table->set('type', ['typical', 'testing']);
            $table->string('title');
            $table->text('desctiption')->nullable();
            $table->tinyInteger('is_visible')->default(1);
            $table->dateTime('deadline')->nullable();

            $table->foreign('section_id')
                ->on('sections')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('zadanies');
    }
}