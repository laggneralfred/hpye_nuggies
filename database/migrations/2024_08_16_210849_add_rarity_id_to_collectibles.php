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
        Schema::table('collectibles', function (Blueprint $table) {
//           $table->foreignId('rarity_id')->nullable()->after('id')->constrained('rarities')->onDelete('cascade');            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('collectibles', function (Blueprint $table) {
            $table->dropForeign(['rarity_id']);
            $table->dropColumn('rarity_id');            //
        });
    }
};
