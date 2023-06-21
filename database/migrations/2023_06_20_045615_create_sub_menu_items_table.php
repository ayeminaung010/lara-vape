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
        Schema::create('sub_menu_items', function (Blueprint $table) {
            $table->id();
            $table->string('name',200);
            $table->foreignId('menu_item_id')->constrained('menu_items')->onDelete('cascade');
            $table->string('slug',200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_menu_items');
    }
};