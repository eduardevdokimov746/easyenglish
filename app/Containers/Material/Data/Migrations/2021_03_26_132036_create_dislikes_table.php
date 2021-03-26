<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDislikesTable extends Migration
{
    public function up()
    {
        Schema::create('dislikes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('material_id');

            $table->foreign('material_id')
                ->on('materials')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unique(['user_id', 'material_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('dislikes');
    }
}
