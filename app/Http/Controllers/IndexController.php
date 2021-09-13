<?php

namespace App\Http\Controllers;

use App\Models\AuctionItem;

class IndexController extends Controller
{
    /**
     * Returns the index page.
     * @return \Illuminate\View\View
     */
    public function __invoke()
    {
        return view('index', [
            'auctionItems' => AuctionItem::all()
        ]);
    }
}
