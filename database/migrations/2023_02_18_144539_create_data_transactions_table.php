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
        Schema::create('data_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('orderid');
            $table->string('statuscode');
            $table->string('api_status');
            $table->string('status');
            $table->string('api_remark')->default('');
            $table->string('ordertype');
            $table->string('mobilenetwork');
            $table->string('mobilenumber');
            $table->string('api_amountcharged')->default('');
            $table->string('amount_charged');
            $table->string('api_balance')->default('');
            $table->integer('query_times')->default(0);
            $table->string('order_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_transactions');
    }
};
