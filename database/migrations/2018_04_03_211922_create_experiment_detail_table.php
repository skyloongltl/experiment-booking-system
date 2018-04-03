<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperimentDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiment_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('date')->comment('实验日期');
            $table->integer('experiment_id')->unsigned();
            $table->integer('teacher_id')->unsigned();
            $table->smallInteger('quotas')->unsigned()->comment('名额');
            $table->smallInteger('use_quotas')->unsigned()->comment('已用名额');
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
        Schema::dropIfExists('experiment_detail');
    }
}
