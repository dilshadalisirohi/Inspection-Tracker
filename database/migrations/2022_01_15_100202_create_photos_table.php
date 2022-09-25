<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->nullable()
                ->references('id')->on('applications')
                ->onDelete('cascade');
            $table->string('type')->nullable();
            $table->string('photo_1')->nullable();
            $table->string('photo_2')->nullable();
            $table->string('photo_3')->nullable();
            $table->string('photo_4')->nullable();
            $table->string('photo_5')->nullable();
            $table->string('photo_6')->nullable();
            $table->string('photo_7')->nullable();
            $table->string('photo_8')->nullable();
            $table->string('photo_9')->nullable();
            $table->string('photo_10')->nullable();
            $table->string('photo_11')->nullable();
            $table->string('photo_12')->nullable();
            $table->string('photo_13')->nullable();
            $table->string('photo_14')->nullable();
            $table->string('photo_15')->nullable();
            $table->string('photo_16')->nullable();
            $table->string('photo_17')->nullable();
            $table->string('photo_18')->nullable();
            $table->string('photo_19')->nullable();
            $table->string('photo_20')->nullable();
            $table->string('photo_21')->nullable();
            $table->string('photo_22')->nullable();
            $table->string('photo_23')->nullable();
            $table->string('photo_24')->nullable();
            $table->string('photo_25')->nullable();
            $table->string('photo_26')->nullable();
            $table->string('photo_27')->nullable();
            $table->string('photo_28')->nullable();
            $table->string('photo_29')->nullable();
            $table->string('photo_30')->nullable();
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
        Schema::dropIfExists('photos');
    }
}
