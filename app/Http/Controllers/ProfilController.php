<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index()
    {
        return view('pages.profil');
    }

    public function update(Request $request)
    {

        auth()->user()->update([
            'name' => $request->name,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : auth()->user()->password,
            'address' => $request->address,
        ]);

        return redirect('/');
    }
}
