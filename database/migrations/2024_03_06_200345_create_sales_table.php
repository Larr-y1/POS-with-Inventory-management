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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->constrained();
            $table->string('receipt_no')->unique();
            $table->foreignId('user_id')->constrained();
            $table->double('amount')->default(0);
            $table->double('amount_received')->default(0);
            $table->double('balance')->default(0);
            $table->string('payment_method')->nullable(); // 0 - cash, 1 - credit, 2 - mpesa, 3 -card, 4 - installment
            $table->string('payment_reference')->nullable();
            $table->string('payment_status')->default('pending'); // 0 - pending, 1 - paid
            $table->boolean('pending_status')->default(false); // 0 - false, 1 - true
            $table->string('status')->default('active'); // active, cancelled
            $table->string('cancelled_date')->nullable();
            $table->string('cancelled_by')->nullable();
            $table->string('notes')->nullable();
            $table->double('total_sales_cost')->default(0);
            $table->double('total_sales_profit')->default(0);
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
