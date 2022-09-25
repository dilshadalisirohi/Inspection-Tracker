<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeficienciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deficiencies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->nullable()
                ->references('id')->on('applications')
                ->onDelete('cascade');
            $table->string('type')->nullable();
            $table->string('deficiency_1')->nullable();
            $table->string('deficiency_photo_1')->nullable();
            $table->string('deficiency_2')->nullable();
            $table->string('deficiency_photo_2')->nullable();
            $table->string('deficiency_3')->nullable();
            $table->string('deficiency_photo_3')->nullable();
            $table->string('deficiency_4')->nullable();
            $table->string('deficiency_photo_4')->nullable();
            $table->string('deficiency_5')->nullable();
            $table->string('deficiency_photo_5')->nullable();
            $table->string('deficiency_6')->nullable();
            $table->string('deficiency_photo_6')->nullable();
            $table->string('deficiency_7')->nullable();
            $table->string('deficiency_photo_7')->nullable();
            $table->string('deficiency_8')->nullable();
            $table->string('deficiency_photo_8')->nullable();
            $table->string('deficiency_9')->nullable();
            $table->string('deficiency_photo_9')->nullable();
            $table->string('deficiency_10')->nullable();
            $table->string('deficiency_photo_10')->nullable();
            $table->string('deficiency_11')->nullable();
            $table->string('deficiency_photo_11')->nullable();
            $table->string('deficiency_12')->nullable();
            $table->string('deficiency_photo_12')->nullable();
            $table->string('deficiency_13')->nullable();
            $table->string('deficiency_photo_13')->nullable();
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
        Schema::dropIfExists('deficiencies');
    }
}
