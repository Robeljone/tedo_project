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
        Schema::create('social_media_properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('social_media_account_id');
            $table->string('property_name');
            $table->integer('status');
            $table->foreignId('cuid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_media_properties');
    }
};
