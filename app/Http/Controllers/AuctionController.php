<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\AuctionData;
use App\Models\Product;
use Illuminate\Http\Request;

class AuctionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        if ($request->search) {
            $products = Product::where('type', 'lelang')->where('name', 'LIKE', '%' . request()->search . '%')->get();
        } else {
            $products = Product::where('type', 'lelang')->get();
        }
        $data = [
            'products' => $products
        ];
        return view('pages.auction.index', $data);
    }

    public function show($slug)
    {
        $product = Product::whereSlug($slug)->firstOrFail();
        $auction = Auction::with(['user', 'offers'])->whereProductId($product->id)->firstOrFail();
        $data = ['auction' => $auction, 'product' => $auction->product, 'seller' => $auction->user, 'offers' => $auction->offers->sortByDesc('offer_price')->take(5)];

        return view('pages.auction.show', $data);
    }

    public function riwayat($slug)
    {
        $product = Product::whereSlug($slug)->firstOrFail();
        $auction = Auction::with(['user', 'offers'])->whereProductId($product->id)->firstOrFail();
        $data = ['auction' => $auction, 'product' => $auction->product, 'seller' => $auction->user, 'offers' => $auction->offers->sortByDesc('offer_price')];

        return view('pages.auction.riwayat', $data);
    }

    public function ajukanPenawaran(Request $request, $id)
    {
        AuctionData::create([
            'user_id' => auth()->id(),
            'auction_id' => $id,
            'offer_price' => $request->offer_price,
        ]);
        return back();
    }
}
