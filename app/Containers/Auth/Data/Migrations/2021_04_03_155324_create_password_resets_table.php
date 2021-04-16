<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePasswordResetsTable extends Migration
{
    public function up()
    {
        Schema::create('password_resets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('email_id');
            $table->string('token');
            $table->timestamp('created_at')->useCurrent();

            $table->foreign('email_id')
                ->on('email_users')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
}
