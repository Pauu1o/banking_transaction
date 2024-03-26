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
        Schema::create('phonebooks', function (Blueprint $table) {
            $table->id();
            $table->string('sender_firstname');
            $table->string('sender_lastname');
            $table->string('receiver_firstname');
            $table->string('receiver_lastname');
            $table->string('amount');
            $table->string('transaction_status');
            $table->string('transaction_type');
            $table->string('branch');
            $table->string('transaction_time');
            $table->string('reference_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phonebooks');
    }
};
