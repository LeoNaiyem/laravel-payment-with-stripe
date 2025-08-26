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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('charge_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->integer('amount');
            $table->string('currency',10)->default('usd');
            $table->string('status')->default('pending');
            $table->string('receipt_url')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('failure_message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
