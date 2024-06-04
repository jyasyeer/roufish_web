<?php

namespace App\Http\Controllers\Penjual;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class SellProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::whereType('jual')->get();
        $data = [
            'products' => $products
        ];
        return view('pages.penjual.produk.jual.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.penjual.produk.jual.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataValues = $request->validate([
            'image' => 'required',
            'name' => 'required',
            'price' => 'required',
            'weight' => 'required',
            'descriptions' => 'required',
        ]);

        $dataValues['user_id'] = auth()->id();
        $dataValues['slug'] = Str::slug($request->name);
        $dataValues['status'] = 'masih';
        $dataValues['type'] = 'jual';
        $dataValues['image'] = $request->image->store('products/images', 'public');

        Product::create($dataValues);

        return redirect()->route('penjual.jual-produk.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        Storage::disk('public')->delete($product->image);
        $product->delete();
        return back();
    }
}
