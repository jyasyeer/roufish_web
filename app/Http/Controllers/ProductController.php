<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        if ($request->search) {
            $products = Product::where('type', 'jual')->where('name', 'LIKE', '%' . request()->search . '%')->get();
        } else {
            $products = Product::where('type', 'jual')->get();
        }
        $data = [
            'products' => $products
        ];
        return view('pages.product.index', $data);
    }

    public function show($slug)
    {
        $product = Product::with('user')->whereSlug($slug)->firstOrFail();
        $data = ['product' => $product, 'seller' => $product->user, 'offers'];

        return view('pages.product.show', $data);
    }

    public function pengiriman($slug)
    {
        $product = Product::with('user')->whereSlug($slug)->firstOrFail();
        $data = ['product' => $product, 'seller' => $product->user, 'offers'];

        return view('pages.product.detail-pengiriman', $data);
    }
}
