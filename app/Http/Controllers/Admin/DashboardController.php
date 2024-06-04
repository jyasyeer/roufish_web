<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $jumlahPenjual = User::where('role', 'penjual')->count();
        $jumlahPembeli = User::where('role', 'pembeli')->count();
        $jumlahProdukJual = Product::where('type', 'jual')->count();
        $jumlahProdukLelang = Product::where('type', 'lelang')->count();
        $data = [
            'jumlahProdukJual' => $jumlahProdukJual,
            'jumlahProdukLelang' => $jumlahProdukLelang,
            'jumlahPenjual' => $jumlahPenjual,
            'jumlahPembeli' => $jumlahPembeli,
        ];
        return view('pages.admin.dashboard', $data);
    }
}
