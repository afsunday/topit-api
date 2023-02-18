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
        Schema::create('data_products', function (Blueprint $table) {
            $table->id();
            $table->string('network_name');
            $table->string('provider_id');
            $table->string('product_code');
            $table->string('product_id');
            $table->string('plan_volume')->default('');
            $table->string('product_name');
            $table->string('product_amount');
            $table->string('product_charge_amount');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_products');
    }
};
