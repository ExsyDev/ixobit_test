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
        Schema::create('params', function (Blueprint $table) {
            $table->id();
            $table->string('memory')->nullable();
            $table->string('display')->nullable();
            $table->string('ram')->nullable();
            $table->string('battery')->nullable();
            $table->string('model')->nullable();
            $table->string('sim')->nullable();
            $table->string('refreshRate')->nullable();
            $table->string('color')->nullable();
            $table->string('processor')->nullable();
            $table->string('connection')->nullable();
            $table->string('displayType')->nullable();
            $table->string('processorModel')->nullable();
            $table->boolean('nfc')->nullable();
            $table->boolean('isRecommended')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('params');
    }
};
