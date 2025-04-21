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
        Schema::create('water_quality', function (Blueprint $table) {
            $table->id();
            $table->string('district_name');
            $table->float('pH');
            $table->float('turbidity'); // Độ đục (NTU)
            $table->float('dissolved_oxygen'); // Oxy hòa tan (mg/L)
            $table->float('temperature'); // Nhiệt độ (°C)
            $table->string('status')->default('Đang cập nhật');
            $table->float('lat'); // Vĩ độ
            $table->float('lon'); // Kinh độ
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('water_quality');
    }
};
