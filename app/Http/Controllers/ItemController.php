<?php

namespace App\Http\Controllers;

use App\Models\AuctionItem;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Renders the information about one specific item listing.
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $item = AuctionItem::find($id);
        if ($item === null) {
            abort(404);
        }

        return view('itemlisting', ['item' => $item]);
    }
}