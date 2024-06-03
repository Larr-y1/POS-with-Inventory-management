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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->string('profile_image')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->foreignId('business_id');

            
            $table->boolean('is_employee')->default(false);
            $table->string('employee_role')->nullable(); // owner, manager, sales, inventory
            $table->string('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('national_id')->nullable();
            $table->string('employment_date')->nullable();
       
            $table->string('verification_token')->nullable();
            $table->string('firebase_token')->nullable();
            $table->string('reset_code')->nullable();
           
            $table->boolean('employee_enabled')->default(false);
           
            $table->boolean('notification_enabled')->default(false);
            $table->string('api_token')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
