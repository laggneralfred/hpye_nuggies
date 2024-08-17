<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'name',
        'email',
        'phone',
        'total_base_points',
        'total_redeemable_points',
        'points_balance',
        'loyalty_tier',
        'points_balance',
    ];
    public function pointsLedgers()
    {
        return $this->hasMany(PointsLedger::class);
    }

    public function redemptionRequests()
    {
        return $this->hasMany(RedemptionRequest::class);
    }

    public function qrCodes()
    {
        return $this->hasMany(QRCode::class);
    }

}
