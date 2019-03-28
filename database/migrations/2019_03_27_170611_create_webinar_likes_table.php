<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebinarLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webinar_likes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('webinar_id');
            $table->integer('user_id');
            $table->boolean('status')->default(1);
            $table->dateTime('created_at');
            // $table->integer('modified_by');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('webinar_likes');
    }
}
