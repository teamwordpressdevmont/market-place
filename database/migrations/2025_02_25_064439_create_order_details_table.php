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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // Order relation
            $table->string('title');
            $table->text('description');
            $table->decimal('budget', 10, 2)->nullable();
            $table->boolean('urgent')->nullable();
            $table->string('urgent_price')->nullable();
            $table->string('job_start_timeline')->nullable();
            $table->string('job_end_timeline')->nullable();
            $table->string('location')->nullable();
            $table->string('address')->nullable();
            $table->json('image')->nullable(); 
            $table->text('additional_notes')->nullable();
            $table->string('featured')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
