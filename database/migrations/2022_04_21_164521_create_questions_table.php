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
            $table->text('opt1')->nullable();
            $table->text('opt2')->nullable();
            $table->text('opt3')->nullable();
            $table->text('opt4')->nullable();
            $table->text('opt5')->nullable();
            $table->text('correct_opt')->nullable();
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
