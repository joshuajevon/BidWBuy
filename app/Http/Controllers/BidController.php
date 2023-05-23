<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auction;
use App\Models\Bid;
use App\Models\User;

class BidController extends Controller
{

    public function auctionById($id){
        $auction = Auction::findOrFail($id);

        $users = User::join('bids', 'users.id', '=', 'bids.user_id')
        ->where('bids.auction_id', $id)
        ->select('users.name', 'bids.amount')
        ->get();

        $userCount = User::join('bids', 'users.id', '=', 'bids.user_id')
                     ->where('bids.auction_id', $id)
                     ->count();

        return view('main.bidById', compact('auction','users','userCount'));
    }

    public function submitBid(Request $request, $auctionId)
    {
        // Validate the bid amount
        $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);

        $amount = $request->input('amount');

        // Retrieve the auction
        $auction = Auction::findOrFail($auctionId);

        // Get the current highest bid
        $highestBid = $auction->bids()->max('amount');

        // Check if the bid amount is higher than the current highest bid
        if ($amount <= $highestBid) {
            return redirect()->back()->with('error', 'Your bid must be higher than the current highest bid.');
        }

        // Create a new bid
        $bid = new Bid();
        $bid->auction_id = $auction->id;
        $bid->user_id = auth()->user()->id; // Assuming you have user authentication
        $bid->amount = $amount;
        $bid->save();

        // Update the current highest bid for the auction
        $auction->current_price = $amount;
        $auction->save();



        return redirect()->back()->with('success', 'Your bid has been submitted successfully.');
    }
}
