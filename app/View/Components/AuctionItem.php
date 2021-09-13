<?php

namespace App\View\Components;

use App\Models\AuctionItem as AuctionItemModel;
use App\Models\Bid;
use Illuminate\View\Component;

class AuctionItem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public AuctionItemModel $item
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.auction-item');
    }
}
