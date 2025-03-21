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
        Schema::create('tradepersons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string( 'nick_name' )->nullable();
            $table->string('username')->unique();
            $table->string('gender')->nullable();
            $table->string('phone')->nullable();
            $table->string('city');
            $table->string('postal_code');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->text('about_me')->nullable();
            $table->text('service')->nullable();
            $table->string('address');
            $table->json('portfolio')->nullable(); 
            $table->string('certificate')->nullable();
            $table->string('banner')->nullable();
            $table->integer('featured')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tradepersons');
    }
};
