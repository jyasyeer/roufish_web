<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\AuctionData;
use App\Models\Product;
use Illuminate\Http\Request;

class AuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auctions = Auction::with(['offers'])->where('user_id', auth()->id())->orderBy('id', 'desc')->get();
        $data = ['auctions' => $auctions];
        return view('pages.penjual.data.lelang.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $auction = Auction::with(['product', 'offers', 'winner'])->findOrFail($id);
        $offers = AuctionData::where('auction_id', $auction->id)->orderByDesc('offer_price')->get();
        $data = [
            'auction' => $auction,
            'product' => $auction->product,
            'offers' => $offers
        ];
        return view('pages.penjual.data.lelang.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $auction = Auction::findOrFail($id);
        $auction_winner = AuctionData::findOrFail($request->auction_winner);
        $auction_winner->update([
            'status' => 'menang'
        ]);
        $auction_lose = AuctionData::where('id', '<>', $request->auction_winner);
        $auction_lose->update([
            'status' => 'kalah'
        ]);
        $auction->update([
            'auction_winner' => $auction_winner->user_id,
            'last_price' => $auction_winner->offer_price,
            'status' => 'berakhir',
        ]);

        $product = Product::findOrFail($auction->product_id);
        $product->update([
            'status' => 'laku'
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
