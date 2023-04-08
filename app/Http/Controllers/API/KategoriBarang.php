<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriBarang extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return response()->json([
            'message' => 'Data Kategori',
            'data' => $kategori,

        ]);
    }

    public function simpan(Request $request)
    {
        $data = [
            'id_harga' => $request->id_harga,
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

        return redirect()->route('kategori');
    }

    public function update($id_harga, Request $request)
    {
        $data = [
            'id_harga' => $request->id_harga,
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

        return redirect()->route('kategori');
    }
    public function hapus($id_harga)
    {
        Kategori::find($id_harga)->delete();

        return redirect()->route('barang');
    }
}
