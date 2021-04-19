<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoursesTable extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->text('characteristic')->nullable();
            $table->text('little_description')->nullable();
            $table->text('target')->nullable();
            $table->text('list_literature')->nullable();
            $table->tinyInteger('is_visible')->default(1);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onUpdate('restrict')
                ->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
