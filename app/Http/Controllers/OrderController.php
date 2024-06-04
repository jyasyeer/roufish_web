<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::whereBuyerId(auth()->id())->get();
        $data = [
            'orders' => $orders
        ];
        return view('pages.order.index', $data);
    }

    public function store(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        Order::create([
            'user_id' => $product->user_id,
            'buyer_id' => auth()->id(),
            'product_id' => $request->product_id,
            'price' => $product->price,
        ]);
        return redirect()->route('riwayat-order.index');
    }
}
