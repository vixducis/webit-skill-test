<?php

namespace App\View\Components\Dashboard;

use App\Models\AuctionItem;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class ItemTable extends Component
{
    public Collection $items;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->items = AuctionItem::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.item-table');
    }
}
