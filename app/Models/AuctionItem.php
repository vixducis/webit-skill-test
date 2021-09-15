<?php

namespace App\Models;

use App\Traits\CacheTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuctionItem extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CacheTrait;

    protected $fillable = [
        'name',
        'description',
        'image'
    ];

    public const IMAGE_PATH = 'storage/images/items/';

    /**
     * Returns the full image path so it can be used in an asset function
     * @return string
     */
    public function getImagePath(): string
    {
        return self::IMAGE_PATH.$this->image;
    }

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
        return $this->getFromCache('highestBid', 
            fn() => $this->bids()->orderby('amount','desc')->first()
        );
    }

    /**
     * Returns the highest bid on this item for the given user.
     * @return Bid|null
     */
    public function getHighestBidForUser(User $user) {
        return $this->getFromCache('highestBid.'.$user->id, 
            fn() => $this->bids()->where('user_id', '=', $user->id)
                ->orderby('amount','desc')->first()
        );
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
