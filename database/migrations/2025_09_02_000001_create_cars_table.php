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
        Schema::create('cars', function (Blueprint $table) {
            $table->id(); // primary key
            $table->string('name'); // اسم السيارة
            $table->string('model'); // الموديل
            $table->decimal('price_per_day', 10, 2); // السعر لليوم
            $table->text('details')->nullable(); // تفاصيل إضافية
            $table->string('image_path')->nullable(); // صورة السيارة
            $table->timestamps(); // created_at + updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
