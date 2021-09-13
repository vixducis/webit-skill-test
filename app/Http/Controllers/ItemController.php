<?php

namespace App\Http\Controllers;

use App\Models\AuctionItem;

class ItemController extends Controller
{
    /**
     * Renders the information about one specific item listing.
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $user = auth()->user();
        $item = $user !== null && $user->admin
            ? AuctionItem::with('bids.user')->find($id)
            : AuctionItem::find($id);

        if ($item === null) {
            abort(404);
        }

        return view('itemlisting', ['item' => $item]);
    }
}
