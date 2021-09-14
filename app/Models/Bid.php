<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'auction_item_id', 'amount'];

    /**
     * Returns which user made the bid.
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user() 
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * Returns which item has been bid on.
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function item()
    {
        return $this->hasOne(AuctionItem::class, 'id', 'auction_item_id');
    }
}
