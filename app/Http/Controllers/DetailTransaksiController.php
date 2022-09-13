<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\DetailTransaksi;

class DetailTransaksiController extends Controller
{
    public function show()
    {
        $dtransaksi = DetailTransaksi::all()->toArray();
        return $dtransaksi;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_transaksi' => 'required',
            'id_produk' => 'required',
            'qty' => 'required',
            'subtotal' => 'required'
        ]);
        if($validator->fails()) {
            return response()->json($validator->errors());
        }
        $dtransaksi = DetailTransaksi::create([
            'id_transaksi' => $request->id_transaksi,
            'id_produk' => $request->id_produk,
            'qty' => $request->qty,
            'subtotal' => $request->subtotal
        ]);
        if($dtransaksi) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }

    public function detail($id)
    {
        $dtransaksi = DetailTransaksi::find($id);
        return $dtransaksi;
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_transaksi' => 'required',
            'id_produk' => 'required',
            'qty' => 'required',
            'subtotal' => 'required'
        ]);
        $dtransaksi = DetailTransaksi::find($id);
        $dtransaksi->update($request->all());
        if($dtransaksi) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }

    public function destroy($id)
    {
        $dtransaksi = DetailTransaksi::find($id);
        $dtransaksi->delete();
        if($dtransaksi) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }
}
