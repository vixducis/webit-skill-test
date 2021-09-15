<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'auction_item_id', 'amount'];

    /**
     * Returns whether this bod is made by the specified user.
     * @param User|null $user
     */
    public function isMadeBy(?User $user): bool
    {
        return $user !== null && (int)$this->user_id === (int)$user->id;
    }

    /**
     * Returns which user made the bid.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Returns which item has been bid on.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item()
    {
        return $this->belongsTo(AuctionItem::class, 'auction_item_id', 'id');
    }
}
