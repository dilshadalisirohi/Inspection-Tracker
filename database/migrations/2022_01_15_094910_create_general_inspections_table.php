<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralInspectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_inspections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')
                ->references('id')->on('applications')
                ->onDelete('cascade');
            $table->string('type');
            $table->string('g5_i_1')->nullable();
            $table->string('g5_i_2')->nullable();
            $table->string('g5_i_3')->nullable();
            $table->string('g5_i_4')->nullable();
            $table->string('g5_i_5')->nullable();
            $table->string('g5_i_6')->nullable();
            $table->string('g5_i_7')->nullable();
            $table->string('g5_i_8')->nullable();
            $table->string('g5_i_9')->nullable();
            $table->string('g5_i_10')->nullable();
            $table->string('g5_i_11')->nullable();
            $table->string('g5_i_12')->nullable();
            $table->string('g5_i_13')->nullable();
            $table->string('g5_i_14')->nullable();
            $table->string('g5_i_15')->nullable();
            $table->string('g5_i_16')->nullable();
            $table->string('g5_i_17')->nullable();
            $table->string('g5_i_18')->nullable();
            $table->string('g5_i_19')->nullable();
            $table->string('g5_i_20')->nullable();
            $table->string('g5_i_21')->nullable();
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
        Schema::dropIfExists('general_inspections');
    }
}
