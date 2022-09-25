<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create50StatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('50_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')
                ->references('id')->on('applications')
                ->onDelete('cascade');
            $table->foreignId('inspector_id')->nullable()
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->string('cancellation_request')->nullable();
            $table->string('date_inspected')->nullable();
            $table->string('inspector')->nullable();
            $table->string('inspector_email')->nullable();
            $table->string('superintendent')->nullable();
            $table->string('superintendent_email')->nullable();
            $table->string('requester_email')->nullable();
            $table->string('superintendent_phone')->nullable();
            $table->string('document_spawn')->nullable();
            $table->string('document_creation_date')->nullable();
            $table->string('inspection_sign_off_date')->nullable();
            $table->string('homeowner_sign_off_date')->nullable();
            $table->string('superintendent_sign_off_date')->nullable();
            $table->string('document_name')->nullable();
            $table->string('inspector_formula_sign')->nullable();
            $table->string('superintendent_formula_sign')->nullable();
            $table->string('general_inspection')->nullable();
//            $table->string('g5_i_1')->nullable();
//            $table->string('g5_i_2')->nullable();
//            $table->string('g5_i_3')->nullable();
//            $table->string('g5_i_4')->nullable();
//            $table->string('g5_i_5')->nullable();
//            $table->string('g5_i_6')->nullable();
//            $table->string('g5_i_7')->nullable();
//            $table->string('g5_i_8')->nullable();
//            $table->string('g5_i_9')->nullable();
//            $table->string('g5_i_10')->nullable();
//            $table->string('g5_i_11')->nullable();
//            $table->string('g5_i_12')->nullable();
//            $table->string('g5_i_13')->nullable();
//            $table->string('g5_i_14')->nullable();
//            $table->string('g5_i_15')->nullable();
//            $table->string('g5_i_16')->nullable();
//            $table->string('g5_i_17')->nullable();
//            $table->string('g5_i_18')->nullable();
//            $table->string('g5_i_19')->nullable();
//            $table->string('g5_i_20')->nullable();
//            $table->string('g5_i_21')->nullable();
            $table->string('exterior_inspection')->nullable();
//            $table->string('e5_i_1')->nullable();
//            $table->string('e5_i_2')->nullable();
//            $table->string('e5_i_3')->nullable();
//            $table->string('e5_i_4')->nullable();
//            $table->string('e5_i_5')->nullable();
//            $table->string('e5_i_6')->nullable();
//            $table->string('e5_i_7')->nullable();
//            $table->string('e5_i_8')->nullable();
//            $table->string('e5_i_9')->nullable();
//            $table->string('e5_i_10')->nullable();
//            $table->string('e5_i_11')->nullable();
//            $table->string('e5_i_12')->nullable();
            $table->string('interior_inspection')->nullable();
//            $table->string('i5_i_1')->nullable();
//            $table->string('i5_i_2')->nullable();
//            $table->string('i5_i_3')->nullable();
//            $table->string('i5_i_4')->nullable();
//            $table->string('i5_i_5')->nullable();
//            $table->string('i5_i_6')->nullable();
//            $table->string('i5_i_7')->nullable();
//            $table->string('i5_i_8')->nullable();
//            $table->string('i5_i_9')->nullable();
//            $table->string('i5_i_10')->nullable();
//            $table->string('i5_i_11')->nullable();
//            $table->string('i5_i_12')->nullable();
//            $table->string('i5_i_13')->nullable();
//            $table->string('i5_i_14')->nullable();
//            $table->string('i5_i_15')->nullable();
            $table->string('window_door_inspection')->nullable();
//            $table->string('wd5_i_1')->nullable();
//            $table->string('wd5_i_2')->nullable();
//            $table->string('wd5_i_3')->nullable();
//            $table->string('wd5_i_4')->nullable();
            $table->string('roof_attic_inspection')->nullable();
//            $table->string('ra5_i_1')->nullable();
//            $table->string('ra5_i_2')->nullable();
//            $table->string('ra5_i_3')->nullable();
//            $table->string('ra5_i_4')->nullable();
//            $table->string('ra5_i_5')->nullable();
//            $table->string('ra5_i_6')->nullable();
//            $table->string('ra5_i_7')->nullable();
//            $table->string('ra5_i_8')->nullable();
//            $table->string('ra5_i_9')->nullable();
//            $table->string('ra5_i_10')->nullable();
//            $table->string('photo_1')->nullable();
//            $table->string('photo_2')->nullable();
//            $table->string('photo_3')->nullable();
//            $table->string('photo_4')->nullable();
//            $table->string('photo_5')->nullable();
//            $table->string('photo_6')->nullable();
//            $table->string('photo_7')->nullable();
//            $table->string('photo_8')->nullable();
//            $table->string('photo_9')->nullable();
//            $table->string('photo_10')->nullable();
//            $table->string('photo_11')->nullable();
//            $table->string('photo_12')->nullable();
//            $table->string('photo_13')->nullable();
//            $table->string('photo_14')->nullable();
//            $table->string('photo_15')->nullable();
//            $table->string('photo_16')->nullable();
//            $table->string('photo_17')->nullable();
//            $table->string('photo_18')->nullable();
//            $table->string('photo_19')->nullable();
//            $table->string('photo_20')->nullable();
//            $table->string('photo_21')->nullable();
//            $table->string('photo_22')->nullable();
//            $table->string('photo_23')->nullable();
//            $table->string('photo_24')->nullable();
//            $table->string('photo_25')->nullable();
//            $table->string('photo_26')->nullable();
//            $table->string('photo_27')->nullable();
//            $table->string('photo_28')->nullable();
//            $table->string('photo_29')->nullable();
//            $table->string('photo_30')->nullable();
//            $table->string('deficiency_1')->nullable();
//            $table->string('deficiency_photo_1')->nullable();
//            $table->string('deficiency_2')->nullable();
//            $table->string('deficiency_photo_2')->nullable();
//            $table->string('deficiency_3')->nullable();
//            $table->string('deficiency_photo_3')->nullable();
//            $table->string('deficiency_4')->nullable();
//            $table->string('deficiency_photo_4')->nullable();
//            $table->string('deficiency_5')->nullable();
//            $table->string('deficiency_photo_5')->nullable();
//            $table->string('deficiency_6')->nullable();
//            $table->string('deficiency_photo_6')->nullable();
//            $table->string('deficiency_7')->nullable();
//            $table->string('deficiency_photo_7')->nullable();
//            $table->string('deficiency_8')->nullable();
//            $table->string('deficiency_photo_8')->nullable();
//            $table->string('deficiency_9')->nullable();
//            $table->string('deficiency_photo_9')->nullable();
//            $table->string('deficiency_10')->nullable();
//            $table->string('deficiency_photo_10')->nullable();
//            $table->string('deficiency_11')->nullable();
//            $table->string('deficiency_photo_11')->nullable();
//            $table->string('deficiency_12')->nullable();
//            $table->string('deficiency_photo_12')->nullable();
//            $table->string('deficiency_13')->nullable();
//            $table->string('deficiency_photo_13')->nullable();
            $table->string('additional_information_1')->nullable();
            $table->string('additional_information_2')->nullable();
            $table->string('additional_information_3')->nullable();
            $table->string('additional_information_4')->nullable();
            $table->string('additional_notes')->nullable();
            $table->string('address_text')->nullable();
            $table->string('attachment_1')->nullable();
            $table->string('ical_text')->nullable();
            $table->string('contractor_builder_name')->nullable();
            $table->string('thumb_1')->nullable();
            $table->string('notify_glo')->nullable();
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
        Schema::dropIfExists('50_statuses');
    }
}
