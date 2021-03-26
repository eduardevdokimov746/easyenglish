<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserMaterialsTable extends Migration
{
    public function up()
    {
        Schema::create('user_materials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('material_id');
            $table->unsignedBigInteger('user_id');
            $table->set('status', ['process', 'finish'])->default('process');

            $table->foreign('material_id')
                ->on('materials')
                ->references('id')
                ->onUpdate('restrict')
                ->onDelete('restrict');

            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_materials');
    }
}
