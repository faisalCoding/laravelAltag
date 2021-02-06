<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudensStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studens_states', function (Blueprint $table) {

            $table->id();

            $table->unsignedInteger('day_id');
            $table->string('name');
            $table->string('hfrom');
            $table->string('hto');
            $table->integer('hcount');
            $table->string('mfrom');
            $table->string('mto');
            $table->integer('mcount');
            $table->integer('starsCount');
            $table->string('list');
            $table->boolean('hasFire');



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
        Schema::dropIfExists('studens_states');
    }
}
