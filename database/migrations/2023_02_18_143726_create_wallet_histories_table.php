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
        Schema::create('wallet_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('transaction_amount');
            $table->string('wallet_balance');
            $table->string('method');// webpay|cash
            $table->string('gateway_ref'); // paystack:ref|api:orderid
            $table->string('transaction_ref')->index();
            $table->string('description');
            $table->string('entry'); // debit|credit
            $table->string('status'); // pending|approved|declined
            $table->dateTime('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallet_histories');
    }
};
