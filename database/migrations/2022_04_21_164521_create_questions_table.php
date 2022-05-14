<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text('qtions');
            $table->String('opt1')->nullable();
            $table->String('opt2')->nullable();
            $table->String('opt3')->nullable();
            $table->String('opt4')->nullable();
            $table->String('opt5')->nullable();
            $table->String('correct_opt')->nullable();
            $table->String('subject_id');
            $table->String('year');
            $table->text('instruction')->nullable();
            $table->String('qimage')->nullable();
            $table->String('qmode');
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
        Schema::dropIfExists('questions');
    }
}
