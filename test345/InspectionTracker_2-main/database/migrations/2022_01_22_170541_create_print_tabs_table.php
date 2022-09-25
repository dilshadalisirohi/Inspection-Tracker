<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrintTabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('print_tabs', function (Blueprint $table) {
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
        Schema::dropIfExists('print_tabs');
    }
}
