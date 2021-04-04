<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSectionsTable extends Migration
{
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->tinyInteger('is_visible')->default(1);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('course_id')
                ->on('courses')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sections');
    }
}
