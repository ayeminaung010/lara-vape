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
        Schema::create('frontends', function (Blueprint $table) {
            $table->id();
            $table->string('logo',200)->nullable();
            $table->string('banner_image',200)->nullable();
            $table->string('facebook_url',200);
            $table->string('instagram_url',200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frontends');
    }
};
