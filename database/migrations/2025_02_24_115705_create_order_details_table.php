<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->decimal('budget', 10, 2)->nullable();
            $table->string('timeline')->nullable();
            $table->string('location')->nullable();
            $table->json('photos')->nullable();
            $table->text('additional_notes')->nullable();
            $table->boolean('featured')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_details');
    }
};