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
        Schema::table('patient_queues', function (Blueprint $table) {
            $table->integer('queue')->after('date'); // atau sesuaikan posisi kolom
        });
    }

    public function down(): void
    {
        Schema::table('patient_queues', function (Blueprint $table) {
            $table->dropColumn('queue');
        });
    }
};
