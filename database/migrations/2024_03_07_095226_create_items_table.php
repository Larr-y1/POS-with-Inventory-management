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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->constrained();
            $table->foreignId('category_id')->constrained();
           /* $table->foreign('category_id')->references('id')->on('categories');*/
            $table->string('item_type')->nullable(); // product, service
            $table->string('name');
            $table->string('image')->nullable();
            $table->double('purchase_price');
            $table->double('selling_price');
            $table->boolean('track_inventory')->default(true);
            $table->string('sku')->nullable();
            $table->double('quantity');
            $table->double('low_stock_count');
            $table->string('barcode')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->boolean('enabled')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
