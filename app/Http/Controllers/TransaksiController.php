<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function show()
    {
        $transaksi = Transaksi::all()->toArray();
        return $transaksi;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_pelanggan' => 'required',
            'tanggal' => 'required',
            'id' => 'required'
        ]);
        if($validator->fails()) {
            return response()->json($validator->errors());
        }
        $transaksi = Transaksi::create([
            'id_pelanggan' => $request->id_pelanggan,
            'tanggal' => $request->tanggal,
            'id' => $request->id
        ]);
        if($transaksi) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }

    public function detail($id)
    {
        $transaksi = Transaksi::find($id);
        return $transaksi;
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_pelanggan' => 'required',
            'tanggal' => 'required',
            'id' => 'required'
        ]);
        $transaksi = Transaksi::find($id);
        $transaksi->update($request->all());
        if($transaksi) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->delete();
        if($transaksi) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }
}
