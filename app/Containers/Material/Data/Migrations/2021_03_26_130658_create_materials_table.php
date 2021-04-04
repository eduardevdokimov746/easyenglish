<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMaterialsTable extends Migration
{
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->text('plain_text');
            $table->text('html_text');
            $table->set('complexity', ['basic', 'middle', 'advanced']);
            $table->unsignedInteger('count_likes')->default(0);
            $table->unsignedInteger('count_dislikes')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('materials');
    }
}
