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
        Schema::create('waste_disposal_record', function (Blueprint $table) {
            $table->string('disposal_id')->primary();
            $table->string('item_id')->contrained('waste_item');
            $table->string('category_name')->contrained('waste_category');
            $table->string('record_id');
            $table->string('facility_id')->constrained('clients');
            $table->timestamp('disposal_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waste_disposal_record');
    }
};
