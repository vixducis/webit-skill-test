<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\User;
use App\Models\AuctionItem;
use App\Providers\RouteServiceProvider;
use App\Mail\BidPlaced;
use App\Mail\Overbid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            return redirect(RouteServiceProvider::HOME);
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

        $item = AuctionItem::find($request->auction_item_id);
        /** @var AuctionItem|null $item */
        $oldTopBid = $item?->getHighestBid();
        /** @var Bid|null $oldTopBid */

        $user = auth()->user();
        /** @var User $user */
        $bid = Bid::create([
            'user_id' => $user->id,
            'auction_item_id' => $request->auction_item_id,
            'amount' => $request->amount
        ]);

        Mail::to($user->email)->send(new BidPlaced($bid));

        // send a mail to the person whose just been overbid, if any
        if(
            $oldTopBid !== null 
            && (float)$oldTopBid->amount < (float)$bid->amount
            && $oldTopBid->user_id != $bid->user_id
        ) {
            Mail::to($oldTopBid->user?->email)->send(new Overbid(
                $oldTopBid,
                $bid
            ));
        }

        return redirect('/bid/'.$bid->id.'/thanks');
    }

    /**
     * Destroys the bid with the given id.
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id)
    {
        $bid = Bid::find($id);
        /** @var Bid|null $bid */
        if ($bid !== null && $bid->isMadeBy(auth()->user())) {
            $bid->delete();
        }
        return back();
    }
}
