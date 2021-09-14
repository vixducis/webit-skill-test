<?php

namespace Database\Factories;

use App\Models\AuctionItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuctionItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AuctionItem::class;

    /**
     * Generates a random file from the available item images.
     */
    private function randomItemImage(): string
    {
        $files = scandir(__DIR__ . '/../../public/storage/images/items/');
        $files = array_diff($files, ['.', '..']);
        return $files[array_rand($files)];
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->paragraph(15),
            'image' => $this->randomItemImage()
        ];
    }
}
