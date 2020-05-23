<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNutritionProgramItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nutrition_program_item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('program_id')->index();
            $table->string('nutrition_id');
            $table->string('meal_id');
            $table->string('day');
            $table->integer('gram');
            $table->integer('calorie');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nutrition_program_items');
    }
}
