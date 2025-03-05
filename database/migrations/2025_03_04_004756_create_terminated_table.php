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
        Schema::create('terminated', function (Blueprint $table) {
            $table->increments('trancheNo');
            $table->integer('batchNo');
            $table->string('subscriber');
            $table->string('accountNo');
            $table->string('amount');
            $table->date('schedule');
            $table->string('office');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terminated');
    }
};
