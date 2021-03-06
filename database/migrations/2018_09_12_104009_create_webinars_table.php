<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebinarsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webinars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->enum('webinar_type', ['live','archived','self_study']);
            $table->text('description');
            $table->dateTime('date');
            $table->string('goto_meeting_code', 255);
            $table->float('hours', 2, 2);
            $table->integer('cpe_credit');
            $table->enum('status', ['active','inactive','delete'])->default('active');
            $table->integer('created_by');
            $table->integer('modified_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('webinars');
    }
}
