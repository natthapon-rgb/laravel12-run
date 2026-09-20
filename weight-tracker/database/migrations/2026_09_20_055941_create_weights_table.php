<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('weights', function (Blueprint $table) {
            $table->id();
            $table->date('recorded_date');           // วันที่ชั่งน้ำหนัก
            $table->decimal('weight_kg', 5, 2);       // น้ำหนัก (กก.)
            $table->text('note')->nullable();         // บันทึกเพิ่มเติม (ถ้ามี)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('weights');
    }
};