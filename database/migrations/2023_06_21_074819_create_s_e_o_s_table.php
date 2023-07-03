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
        Schema::create('s_e_o_s', function (Blueprint $table) {
            $table->id();
            $table->string('seo_image',200)->nullable();
            $table->string('title',200);
            $table->string('favicon',200)->nullable();
            $table->string('keywords',200);
            $table->string('author',200);
            $table->text('description');
            $table->string('social_image',200)->nullable();
            $table->string('social_title',200);
            $table->text('social_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_e_o_s');
    }
};
