<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShopifyFieldsToCollectiblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('collectibles', function (Blueprint $table) {
            if (!Schema::hasColumn('collectibles', 'shopify_id')) {
                $table->unsignedBigInteger('shopify_id')->nullable()->after('id');
            }
            if (!Schema::hasColumn('collectibles', 'title')) {
                $table->string('title')->nullable()->after('shopify_id');
            }
            if (!Schema::hasColumn('collectibles', 'description')) {
                $table->text('description')->nullable()->after('title');
            }
            if (!Schema::hasColumn('collectibles', 'vendor')) {
                $table->string('vendor')->nullable()->after('description');
            }
            if (!Schema::hasColumn('collectibles', 'product_type')) {
                $table->string('product_type')->nullable()->after('vendor');
            }
            if (!Schema::hasColumn('collectibles', 'shopify_created_at')) {
                $table->timestamp('shopify_created_at')->nullable()->after('product_type');
            }
            if (!Schema::hasColumn('collectibles', 'shopify_updated_at')) {
                $table->timestamp('shopify_updated_at')->nullable()->after('shopify_created_at');
            }
            if (!Schema::hasColumn('collectibles', 'price')) {
                $table->decimal('price', 8, 2)->nullable()->after('shopify_updated_at');
            }
            if (!Schema::hasColumn('collectibles', 'inventory_quantity')) {
                $table->integer('inventory_quantity')->nullable()->after('price');
            }
            if (!Schema::hasColumn('collectibles', 'sku')) {
                $table->string('sku')->nullable()->after('inventory_quantity');
            }
            if (!Schema::hasColumn('collectibles', 'image_src')) {
                $table->string('image_src')->nullable()->after('sku');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('collectibles', function (Blueprint $table) {
            $table->dropColumn('shopify_id');
            $table->dropColumn('title');
            $table->dropColumn('description');
            $table->dropColumn('vendor');
            $table->dropColumn('product_type');
            $table->dropColumn('shopify_created_at');
            $table->dropColumn('shopify_updated_at');
            $table->dropColumn('price');
            $table->dropColumn('inventory_quantity');
            $table->dropColumn('sku');
            $table->dropColumn('image_src');
        });
    }
}
