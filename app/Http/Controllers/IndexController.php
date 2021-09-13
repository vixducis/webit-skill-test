<?php

namespace App\Http\Controllers;

use App\Models\AuctionItem;
use App\View\Components\auctionItemComponent;
use Illuminate\Http\Request;

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
