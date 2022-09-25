<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRehabStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rehab_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->nullable()
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
            $table->string('exterior_inspection')->nullable();
            $table->string('interior_inspection')->nullable();
            $table->string('electrical_inspection')->nullable();
            $table->string('accessibility_inspection')->nullable();
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
        Schema::dropIfExists('rehab_status');
    }
}
