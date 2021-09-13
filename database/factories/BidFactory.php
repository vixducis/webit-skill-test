<?php

namespace Database\Factories;

use App\Models\AuctionItem;
use App\Models\Bid;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BidFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bid::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all('id')->random(),
            'auction_item_id' => AuctionItem::all('id')->random(),
            'amount' => $this->faker->randomFloat(2, 0.01, 500)
        ];
    }
}
