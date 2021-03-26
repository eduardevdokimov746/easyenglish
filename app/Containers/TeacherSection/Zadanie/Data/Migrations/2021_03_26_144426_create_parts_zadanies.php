<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartsZadanies extends Migration
{
    public function up()
    {
        Schema::create('parts_zadanies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('zadanie_id');
            $table->set('type', ['one_variant', 'many_variants', 'collation']);
            $table->text('question');
            $table->text('data');
            $table->integer('score');

            $table->foreign('zadanie_id')
                ->on('zadanies')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('parts_zadanies');
    }
}
