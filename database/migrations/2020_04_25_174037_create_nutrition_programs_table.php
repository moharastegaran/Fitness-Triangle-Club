<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNutritionProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nutrition_program', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('coach_id')->index();
            $table->integer('request_id')->index()->nullable();
            $table->string('requester_name')->nullable();
            $table->date('from');
            $table->integer('duration');
            $table->boolean('day_type')->default(1);
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('nutrition_programs');
    }
}
