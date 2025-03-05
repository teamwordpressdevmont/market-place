<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tradeperson_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tradeperson_id')->constrained('tradepersons')->onDelete('cascade');
            $table->text('about')->nullable();
            $table->text('services')->nullable();
            $table->json('portfolio')->nullable();
            $table->json('certifications')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tradeperson_details');
    }
};

