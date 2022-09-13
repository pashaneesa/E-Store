<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function show()
    {
        $produk = Produk::all()->toArray();
        return $produk;
    }

    public function detail($id)
    {
        $produk = Produk::find($id);
        return $produk;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'foto' => 'required'
        ]);
        if($validator->fails()) {
            return response()->json($validator->errors());
        }
        $produk = Produk::create([
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'foto' => $request->foto
        ]);
        if($produk) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'foto' => 'required'
        ]);
        $produk = Produk::find($id);
        $produk->update($request->all());
        if($produk) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }

    public function destroy($id)
    {
        $produk = Produk::find($id);
        $produk->delete();
        if($produk) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }
}