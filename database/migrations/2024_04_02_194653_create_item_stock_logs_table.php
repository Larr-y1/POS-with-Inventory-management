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
        Schema::create('item_stock_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->constrained();
            $table->foreignId('item_id')->constrained();
            $table->double('quantity')->default(0);
            $table->double('price')->default(0);
            $table->double('total_amount')->default(0);
            $table->foreignId('user_id')->constrained();
            $table->string('reference_id')->nullable();
            $table->string('transaction_type')->nullable(); // purchase, sale, issue, damage, stolen, purchase_void, sale_void, expiry, stock_loan, stock_loan_repayment
            $table->timestamps();
        });
         
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_stock_logs');
    }
};
