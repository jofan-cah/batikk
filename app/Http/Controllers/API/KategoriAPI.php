<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class KategoriAPI extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        $data = DB::table('harga_barang')
            ->join('users', 'users.id', '=', 'harga_barang.updat')
            ->get();


        return response()->json([
            'message' => 'Data Kategori',
            'data' => $kategori,

        ]);
    }

    public function show($id_harga)
    {
        $barang = Barang::find($id_harga);
        // $user = User::find($id_harga);

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

    public function simpan(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'sku' => 'required',
            'harga' => 'required',
            'diskon' => 'required',
            'tgl_berlaku' => 'required',
            'kode_cp' => 'required',
            'tgl_del' => 'required',
            'diskon_psn' => 'required',
            'updat' => 'required',

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
            // 'id_harga' => $request->id_harga,
            'sku' => $request->sku,
            'harga' => $request->harga,
            'diskon' => $request->diskon,
            'tgl_berlaku' => $request->tgl_berlaku,
            'kode_cp' => $request->kode_cp,
            'tgl_del' => $request->tgl_del,
            'diskon_psn' => $request->diskon_psn,
            'updat' => $request->updat
        ];
        Kategori::create($data);

        return response()->json([
            'message' => 'Data di tambahkan',
            'data' => $data
        ]);
    }

    public function update($id_harga, Request $request)
    {


        $validator = Validator::make($request->all(), [
            'sku' => 'required',
            'sku' => 'required',
            'harga' => 'required',
            'diskon' => 'required',
            'tgl_berlaku' => 'required',
            'kode_cp' => 'required',
            'tgl_del' => 'required',
            'diskon_psn' => 'required',
            'updat' => 'required',
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
            'harga' => $request->harga,
            'diskon' => $request->diskon,
            'tgl_berlaku' => $request->tgl_berlaku,
            'kode_cp' => $request->kode_cp,
            'tgl_del' => $request->tgl_del,
            'diskon_psn' => $request->diskon_psn,
            'updat' => $request->updat
        ];
        Kategori::find($id_harga)->update($data);

        return response()->json([
            'message' => 'Data di Update',
            'data' => $data
        ]);
    }
    public function destroy($id_harga)
    {
        Kategori::find($id_harga)->delete();

        return response()->json([
            'message' => 'Data di Hapus',
            'data' => $id_harga
        ]);
    }
}
