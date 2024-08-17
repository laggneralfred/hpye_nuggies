<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointsLedger extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'customer_id',
        'date',
        'transaction_type',
        'points',
        'base_points_balance',
        'redeemable_points_balance',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
