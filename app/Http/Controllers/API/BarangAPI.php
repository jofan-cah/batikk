<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BarangAPI extends Controller
{
    public function index()
    {

        $data = DB::table('barang')
            ->join('users', 'users.id', '=', 'barang.updat')
            ->get();

        return response()->json([
            'message' => 'Login success',
            'data' =>  $data,

        ]);
    }


    public function simpan(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'sku' => 'required',
            'korner' => 'required',
            'produk' => 'required',
            'model' => 'required',
            'motif' => 'required',
            'proses' => 'required',
            'material' => 'required',
            'warna' => 'required',
            'rasa' => 'required',
            'brand' => 'required',
            'size' => 'required',
            'satuan' => 'required',
            'status' => 'required',
            'sup' => 'required',
            'asal' => 'required',
            'pt' => 'required',
            'updat' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    'message' => 'Error',
                    'eroors' => $validator->errors()
                ]
            );
        }

        $data = [
            'sku' => $request->sku,
            'korner' => $request->korner,
            'produk' => $request->produk,
            'model' => $request->model,
            'motif' => $request->motif,
            'proses' => $request->proses,
            'material' => $request->material,
            'warna' => $request->warna,
            'rasa' => $request->rasa,
            'brand' => $request->brand,
            'size' => $request->size,
            'satuan' => $request->satuan,
            'status' => $request->status,
            'sup' => $request->sup,
            'asal' => $request->asal,
            'pt' => $request->pt,
            'updat' => $request->updat
        ];



        Barang::create($data);

        return response()->json([
            'message' => 'Data Berhasil Di tambah',
            'data' =>  $data,

        ]);
    }

    public function show($id)
    {
        $barang = Barang::find($id);
        // $user = User::find($id);

        if ($barang) {
            return response()->json([
                'message' => 'Data di temukan',
                'data' => $barang
            ]);
        } else {
            return response()->json([
                'message' => 'Data not found !'
            ], 422);
        }
    }

    public function update($id, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'sku' => 'required',
            'korner' => 'required',
            'produk' => 'required',
            'model' => 'required',
            'motif' => 'required',
            'proses' => 'required',
            'material' => 'required',
            'warna' => 'required',
            'rasa' => 'required',
            'brand' => 'required',
            'size' => 'required',
            'satuan' => 'required',
            'status' => 'required',
            'sup' => 'required',
            'asal' => 'required',
            'pt' => 'required',
            'updat' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(
                [
                    'message' => 'Error',
                    'eroors' => $validator->errors()
                ]
            );
        }
        $data = [
            'sku' => $request->sku,
            'korner' => $request->korner,
            'produk' => $request->produk,
            'model' => $request->model,
            'motif' => $request->motif,
            'korner' => $request->korner,
            'produk' => $request->produk,
            'model' => $request->model,
            'motif' => $request->motif,
            'proses' => $request->proses,
            'material' => $request->material,
            'warna' => $request->warna,
            'rasa' => $request->rasa,
            'brand' => $request->brand,
            'size' => $request->size,
            'satuan' => $request->satuan,
            'status' => $request->status,
            'sup' => $request->sup,
            'asal' => $request->asal,
            'pt' => $request->pt,
            'updat' => $request->updat
        ];

        Barang::find($id)->update($data);

        return response()->json([
            'message' => 'Data berhasil di ubah',
            'data' => $data
        ]);
    }

    public function destroy($id)
    {
        Barang::find($id)->delete();

        return response()->json([
            'message' => 'Data di Hapus' . $id,
            'data' => $id
        ]);
    }
}
