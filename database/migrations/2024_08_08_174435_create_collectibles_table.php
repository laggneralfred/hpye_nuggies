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
        Schema::create('collectibles', function (Blueprint $table) {
            $table->id();
	    $table->string('collectible_id')->unique()->nullable();
    	    $table->string('name')->nullable();
            $table->string('rarity')->nullable();
            $table->integer('version')->nullable();
            $table->integer('sequence_number')->nullable();
            $table->string('qr_code_id')->unique()->nullable();
            $table->integer('loyalty_points')->nullable();
            $table->integer('nfts_included')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collectibles');
    }
};
