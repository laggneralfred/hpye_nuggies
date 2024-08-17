<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QRCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'collectible_id',
        'scanned_at'
    ];
    public function collectible()
    {
        return $this->belongsTo(Collectible::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
