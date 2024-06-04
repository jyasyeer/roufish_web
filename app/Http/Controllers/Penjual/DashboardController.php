<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $jumlahProdukJual = Product::where('user_id', auth()->id())->where('type', 'jual')->count();
        $jumlahProdukLelang = Product::where('user_id', auth()->id())->where('type', 'lelang')->count();
        $jumlahLelang = Auction::where('user_id', auth()->id())->count();
        $jumlahOrder = Order::where('user_id', auth()->id())->count();
        $data = [
            'jumlahProdukJual' => $jumlahProdukJual,
            'jumlahProdukLelang' => $jumlahProdukLelang,
            'jumlahLelang' => $jumlahLelang,
            'jumlahOrder' => $jumlahOrder,
        ];
        return view('pages.penjual.dashboard', $data);
    }
}
