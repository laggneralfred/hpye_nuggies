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
        Schema::create('redemption_requests', function (Blueprint $table) {
            $table->id();
            $table->string('request_id')->unique()->nullable();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade')->nullable();
            $table->string('item_requested')->nullable();
            $table->integer('points_required')->nullable();
            $table->string('status')->default('Pending')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redemption_requests');
    }
};
