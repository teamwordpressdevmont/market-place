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
        Schema::create('tradeperson_contract_usages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tradeperson_id')->constrained('tradepersons')->onDelete('cascade');
            $table->integer('total_contracts')->nullable();
            $table->integer('available_contracts')->nullable();
            $table->integer('used_contracts')->nullable();
            $table->date('reset_date')->nullable();
            $table->date('last_reset_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tradeperson_contract_usages');
    }
};
