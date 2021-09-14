<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuctionItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'image'
    ];

    public const STORAGE_PATH = 'images/items/';
    public const IMAGE_PATH = 'storage/'.self::STORAGE_PATH;

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
