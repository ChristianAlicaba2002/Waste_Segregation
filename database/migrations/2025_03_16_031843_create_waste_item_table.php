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
        Schema::create('waste_item', function (Blueprint $table) {
            $table->string('item_id')->primary();
            $table->string('category_id')->contrained('waste_category');
            $table->string('item_category')->contrained('waste_category');
            $table->timestamp('time_segregated');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waste_item');
    }
};
