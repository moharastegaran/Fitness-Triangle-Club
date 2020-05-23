<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkoutProgramItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workout_program_item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('program_id')->index();
            $table->string('workout_ids');
            $table->string('day');
            $table->tinyInteger('set')->nullable();
            $table->string('repeat')->nullable();
            $table->string('rhythm')->nullable();
            $table->string('gap')->nullable();
            $table->string('comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workout_program_item');
    }
}
