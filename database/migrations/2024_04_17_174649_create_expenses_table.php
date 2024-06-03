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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->double('amount')->default(0);
            $table->string('expense_type')->nullable(); // general, wage, invoice, credit
            $table->string('payment_method')->nullable(); // cash, credit, mobile_money, card, other
            $table->string('beneficiary')->nullable();
            $table->boolean('enable_due_date')->default(false);
            $table->string('due_date')->nullable();
            $table->string('status')->default('pending'); // pending, paid, cancelled
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
