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
    Schema::create('assets', function (Blueprint $table) {
        $table->id();
        $table->string('asset_name');
        $table->string('serial_number')->unique();
        $table->foreignId('category_id')->constrained()->onDelete('cascade');
        $table->string('status')->default('Available'); // Available, Assigned, Under Maintenance
        $table->date('purchase_date')->nullable();
        $table->string('condition')->default('Good');
        $table->text('notes')->nullable();
        $table->string('location')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
