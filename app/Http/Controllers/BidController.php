<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use Illuminate\Http\Request;

class BidController extends Controller
{   
    /**
     * Renders the 'thank you' page after placing a bid.
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function thanks(int $id)
    {
        $bid = Bid::with('item')->find($id);
        $user = auth()->user();
        if (
            $bid === null
            || $user === null
            || (int)$bid->user_id !== (int)$user->id
        ) {
            return redirect('/');
        }

        return view('bid-thanks', ['bid' => $bid]);
    }

    /**
     * Stores a new bid into the database.
     * Will redirect to the thanks page.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) 
    {
        $request->validate([
            'auction_item_id' => ['required', 'numeric'],
            'amount' => ['required', 'numeric']
        ]);

        $user = auth()->user();
        if ($user === null) {
            abort(401);
        }

        $bid = Bid::create([
            'user_id' => $user->id,
            'auction_item_id' => $request->auction_item_id,
            'amount' => $request->amount
        ]);

        return redirect('/bid/'.$bid->id.'/thanks');
    }
}
