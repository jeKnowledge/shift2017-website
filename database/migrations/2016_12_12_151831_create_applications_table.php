<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->text('pitch');
            $table->string('portfolio')->nullable();
            $table->text('urls')->nullable();
            $table->text('comments')->nullable();
            $table->boolean('firstTime');
            $table->boolean('accepted')->nullable();
            $table->integer('shifter_id')->unsigned();
            $table->integer('edition_id')->unsigned();
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
        Schema::dropIfExists('applications');
    }
}
