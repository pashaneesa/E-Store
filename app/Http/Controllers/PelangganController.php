<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    public function show()
    {
        $pelanggan = Pelanggan::all()->toArray();
        return $pelanggan;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'tlp' => 'required',
            'usn' => 'required',
            'password' => 'required',
        ]);
        if($validator->fails()) {
            return response()->json($validator->errors());
        }
        $pelanggan = Pelanggan::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat' => $request->alamat,
            'tlp' => $request->tlp,
            'usn' => $request->usn,
            'password' => $request->password
        ]);
        if($pelanggan) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }

    public function detail($id)
    {
        $pelanggan = Pelanggan::find($id);
        return $pelanggan;
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'tlp' => 'required',
            'usn' => 'required',
            'password' => 'required',
        ]);
        $pelanggan = Pelanggan::find($id);
        $pelanggan->update($request->all());
        if($pelanggan) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }

    public function destroy($id)
    {
        $pelanggan = Pelanggan::find($id);
        $pelanggan->delete();
        if($pelanggan) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }
}
