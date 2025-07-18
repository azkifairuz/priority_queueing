<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patient_queues', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->timestamp('time');
            $table->unsignedBigInteger('triage_id');
            $table->unsignedBigInteger('patient_id');
            $table->enum('status', ['red', 'yellow', 'green']);
            $table->enum('state', ['waiting', 'in_progress', 'completed','canceled'])->default('waiting');
            $table->timestamps();

            $table->foreign('triage_id')->references('id')->on('triages')->onDelete('cascade');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_queues');
    }
};
