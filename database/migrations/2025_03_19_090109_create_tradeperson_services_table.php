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
        Schema::create('tradeperson_services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->longText('features');
            $table->decimal('price', 10, 2);
            $table->string('binding_period')->nullable();
            $table->enum('search_visibility', ['Medium', 'High', 'Premium'])->nullable();
            $table->boolean('recommended_tradeperson')->nullable();
            $table->boolean('appear_homepage')->nullable();
            $table->boolean('access_premium_tender')->nullable();
            $table->integer('extra_clip')->nullable();
            $table->boolean('google_visibility')->nullable();
            $table->integer('contract_creation')->nullable();
            $table->integer('free_contract')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tradeperson_services');
    }
};
