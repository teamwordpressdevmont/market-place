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
        Schema::create('tradeperson_service_purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tradeperson_id')->constrained('tradepersons')->onDelete('cascade');
            $table->foreignId('tradeperson_service_id')->constrained('tradeperson_services')->onDelete('cascade');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->foreignId('status_id')->constrained('subscription_statuses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tradeperson_service_purchases');
    }
};
