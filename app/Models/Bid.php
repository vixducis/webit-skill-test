<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    /**
     * Returns which user made the bid.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user() 
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
