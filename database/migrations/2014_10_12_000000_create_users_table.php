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
            $table->string('firstname');
            $table->string('lastname');
            $table->string('user_type');
            $table->string('account_number')->nullable()->index();
            $table->string('account_name')->nullable()->index();
            $table->string('bank_name')->nullable()->index();
            $table->decimal('wallet_balance', 15, 2)->default(0)->index();
            $table->integer('total_contacts')->default(0);
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->string('avatar');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('status')->default(true);
            $table->rememberToken();
            $table->timestamps();
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
