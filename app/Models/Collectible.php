<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collectible extends Model
{
    use HasFactory;

    protected $fillable = [
        'collectible_id',   // Ensure this is intended to be fillable and unique
        'name',
        'rarity',
        'version',
        'sequence_number',
        'qr_code_id',      // Ensure this is intended to be fillable and unique
        'loyalty_points',
        'nfts_included',
        'rarity_id',
        'shopify_id',
        'title',
        'description', // mapped from body_html
        'vendor',
        'product_type',
        'shopify_created_at',
        'shopify_updated_at',
        'price',
        'inventory_quantity',
        'sku',
        'image_src',
        // other fields as needed
    ];
    /**
     * The QRCode relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function qrCode()
    {
        // Assuming 'qr_code_id' is the foreign key in the QRCode model
        return $this->hasOne(QRCode::class, 'qr_code_id', 'qr_code_id');
    }

    public function rarity()
    {
        return $this->belongsTo(Rarity::class);
    }
}
