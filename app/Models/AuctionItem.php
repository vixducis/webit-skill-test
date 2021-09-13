<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuctionItem extends Model
{
    use HasFactory;

    /**
     * Returns the relationship to the bids.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bids() 
    {
        return $this->hasMany(Bid::class);
    }

    /**
     * Returns the highest bid for this item.
     * @return Bid|null
     */
    public function getHighestBid()
    {
        return $this->bids()->orderby('amount','desc')->first();
    }

    /**
     * Returns the highest bid in textual format.
     * @return string
     */
    public function getHighestBidText() {
        $bid = $this->getHighestBid();
        return $bid === null
            ? 'No bid'
            : '€ '.$bid->amount;
    }
}
