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
        
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->longText('features');
            $table->decimal('price', 10, 2);
            $table->integer('clip_number');
            $table->integer('free_clip_number');
            $table->string('binding_period')->nullable();
            $table->enum('profile_type', ['Standard', 'Premium']);
            $table->boolean('google_visibility')->nullable();
            $table->boolean('search_visibility')->nullable();
            $table->boolean('messaging_system')->nullable();
            $table->boolean('notification_system')->nullable();
            $table->boolean('priority_support')->nullable();
            $table->boolean('tag')->nullable();
            $table->boolean('highlighted')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::dropIfExists('subscriptions');
    }
};
