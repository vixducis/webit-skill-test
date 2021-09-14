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
        return $this->belongsTo(User::class);
    }

    /**
     * Returns which item has been bid on.
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function item()
    {
        return $this->belongsTo(AuctionItem::class, 'auction_item_id', 'id');
    }
}
