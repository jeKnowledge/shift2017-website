<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShiftersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shifters', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('student')->nullable();
            $table->string('type')->nullable();
            $table->string('university')->nullable();
            $table->string('course')->nullable();
            $table->string('institution')->nullable();
            $table->string('role')->nullable();
            $table->integer('age')->unsigned()->nullable();
            $table->text('bio')->nullable();
            $table->string('twitter')->nullable();
            $table->string('github')->nullable();
            $table->string('website')->nullable();
            $table->string('location')->nullable();
            $table->integer('user_id')->unsigned();
            $table->boolean('allowPartners')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shifters');
    }
}
