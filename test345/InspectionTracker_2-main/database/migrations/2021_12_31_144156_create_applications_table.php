<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('document_1')->nullable();
            $table->string('document_file_1')->nullable();
            $table->string('document_2')->nullable();
            $table->string('document_file_2')->nullable();
            $table->string('document_3')->nullable();
            $table->string('document_file_3')->nullable();
            $table->string('document_4')->nullable();
            $table->string('document_file_4')->nullable();
            $table->string('document_5')->nullable();
            $table->string('document_file_5')->nullable();
            $table->string('document_6')->nullable();
            $table->string('document_file_6')->nullable();
            $table->string('hriq_id')->nullable();
            $table->string('submitted_glo')->nullable();
            $table->string('date_glo_submission')->nullable();
            $table->string('application_id')->nullable();
            $table->string('applicant_name')->nullable();
            $table->string('applicant_address')->nullable();
            $table->string('applicant_city')->nullable();
            $table->string('applicant_county')->nullable();
            $table->foreignId('requester_id')->nullable()
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->string('requester_name')->nullable();
            $table->string('requester_email')->nullable();
            $table->string('requester_phone')->nullable();
            $table->string('company')->nullable();
            $table->string('requested_date')->nullable();
            $table->string('requested_time')->nullable();
            $table->string('construction_type')->nullable();
            $table->string('floor_plan')->nullable();
            $table->string('inspection_type')->nullable();
            $table->string('region')->nullable();
            $table->string('supervisor_name')->nullable();
            $table->string('supervisor_email')->nullable();
            $table->string('supervisor_phone')->nullable();
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
        Schema::dropIfExists('applications');
    }
}
