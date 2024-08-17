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
        Schema::create('rarities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('percent_of_total_inventory', 5, 2);
            $table->integer('nfts_included');
            $table->integer('loyalty_points_earned');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rarities');
    }
};
