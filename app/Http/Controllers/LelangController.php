<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\AuctionData;
use Illuminate\Http\Request;

class LelangController extends Controller
{
    public function index()
    {
        $auctions = AuctionData::where('user_id', auth()->id())->orderBy('id', 'desc')->get();
        $data = [
            'auctions' => $auctions
        ];
        return view('pages.lelang.index', $data);
    }

    public function show($id)
    {
        $bids = AuctionData::findOrFail($id);
        $auction = Auction::with(['user', 'offers'])->whereId($bids->auction_id)->firstOrFail();
        $data = ['auction' => $auction, 'product' => $auction->product, 'seller' => $auction->user, 'offers' => $auction->offers->sortByDesc('offer_price'), 'bids' => $bids];

        return view('pages.lelang.show', $data);
    }

    public function pengiriman(Request $request, $id)
    {
        $bids = AuctionData::whereId($id)->firstOrFail();
        $bids->update([
            'address' => $request->address,
        ]);
        return back();
    }
}
