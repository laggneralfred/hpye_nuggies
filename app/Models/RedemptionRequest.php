<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedemptionRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'collectible_id',
        'points_redeemed',
        'redeemed_at'
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
