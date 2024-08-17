<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rarity extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'percent_of_total_inventory', 'nfts_included', 'loyalty_points_earned'];

    public function collectibles()
    {
        return $this->hasMany(Collectible::class);
    }
}
