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

    public function cari(Request $request)
    {
        $result = DB::table('barang')
            ->join('users', 'users.id', '=', 'barang.updat')
            ->get();


        if (Auth::user()->level == 'Admin' || Auth::user()->level == 'User') {


            // dd($request->produk);
            $data = DB::table('barang')
                ->join('users', 'users.id', '=', 'barang.updat')
                ->get();

            // SIngel

            // dd($request->sku);
            if ($request->sku) {
                // $result = 'sku';
                // dd($result);
                $result = Barang::where('sku', 'LIKE', '%' . $request->sku . '%')->get();
            }

            // dd($request->produk);
            if ($request->produk) {

                $result = Barang::where('produk', 'LIKE', '%' . $request->produk . '%')->get();
            }
            // dd($request->motif);
            if ($request->motif) {

                $result = Barang::where('motif', 'LIKE', '%' . $request->motif . '%')->get();
            }
            // dd($request->brand);
            if ($request->brand) {
                $result = Barang::where('brand', 'LIKE', '%' . $request->brand . '%')->get();
            }
            // dd($request->warna);
            if ($request->warna) {
                $result = Barang::where('warna', 'LIKE', '%' . $request->warna . '%')->get();
            }
            // dd($request->size);
            if ($request->size) {
                $result = Barang::where('size', 'LIKE', '%' . $request->size . '%')->get();
            }

            // Akhir Single


            // SKU doble
            // Produk & SKU
            if ($request->produk && $request->sku) {
                // $result = 'Produk SKU';
                // dd($result);
                $result = Barang::where('sku', 'LIKE', '%' . $request->sku . '%')
                    ->where('produk', 'LIKE', '%' . $request->produk . '%')->get();
            }

            // Motif & SKU
            if ($request->motif && $request->sku) {

                $result = Barang::where('sku', 'LIKE', '%' . $request->sku . '%')
                    ->where('produk', 'LIKE', '%' . $request->produk . '%')->get();
            }
            // sku & brand
            if ($request->brand && $request->sku) {

                $result = Barang::where('sku', 'LIKE', '%' . $request->sku . '%')
                    ->where('brand', 'LIKE', '%' . $request->brand . '%')->get();
            }
            // sku & brand
            if ($request->sku && $request->size) {

                $result = Barang::where('sku', 'LIKE', '%' . $request->sku . '%')
                    ->where('size', 'LIKE', '%' . $request->size . '%')->get();
            }
            // sku & brand
            if ($request->sku && $request->warna) {

                $result = Barang::where('sku', 'LIKE', '%' . $request->sku . '%')
                    ->where('warna', 'LIKE', '%' . $request->warna . '%')->get();
            }



            // Akhir SKU


            // dd($request->produk && $request->motif);
            if ($request->produk && $request->motif) {

                $result = Barang::where('motif', 'LIKE', '%' . $request->motif . '%')
                    ->where('produk', 'LIKE', '%' . $request->produk . '%')->get();
            }
            if ($request->produk && $request->brand) {

                $result = Barang::where('brand', 'LIKE', '%' . $request->brand . '%')
                    ->where('produk', 'LIKE', '%' . $request->produk . '%')->get();
            }
            // dd($request->produk && $request->motif);
            if ($request->produk && $request->warna) {

                $result = Barang::where('warna', 'LIKE', '%' . $request->warna . '%')
                    ->where('produk', 'LIKE', '%' . $request->produk . '%')->get();
            }
            if ($request->produk && $request->size) {

                $result = Barang::where('size', 'LIKE', '%' . $request->size . '%')
                    ->where('produk', 'LIKE', '%' . $request->produk . '%')->get();
            }
            // Akhir Produk
            // Motif

            if (
                $request->brand && $request->motif
            ) {

                $result = Barang::where(
                    'motif',
                    'LIKE',
                    '%' . $request->motif . '%'
                )
                    ->where('brand', 'LIKE', '%' . $request->brand . '%')->get();
            }
            if (
                $request->warna && $request->motif
            ) {

                $result = Barang::where(
                    'motif',
                    'LIKE',
                    '%' . $request->motif . '%'
                )
                    ->where('warna', 'LIKE', '%' . $request->warna . '%')->get();
            }
            if (
                $request->size && $request->motif
            ) {

                $result = Barang::where(
                    'motif',
                    'LIKE',
                    '%' . $request->motif . '%'
                )
                    ->where('size', 'LIKE', '%' . $request->size . '%')->get();
            }
            // Akhir Motif
            // Awal Brand
            if (
                $request->brand && $request->size
            ) {

                $result = Barang::where(
                    'size',
                    'LIKE',
                    '%' . $request->size . '%'
                )
                    ->where('brand', 'LIKE', '%' . $request->brand . '%')->get();
            }
            if (
                $request->brand && $request->warna
            ) {

                $result = Barang::where(
                    'warna',
                    'LIKE',
                    '%' . $request->warna . '%'
                )
                    ->where('brand', 'LIKE', '%' . $request->warna . '%')->get();
            }
            // Akhir Brand

            // Awal Warna
            if (
                $request->size && $request->warna
            ) {

                $result = Barang::where(
                    'size',
                    'LIKE',
                    '%' . $request->size . '%'
                )
                    ->where('size', 'LIKE', '%' . $request->warna . '%')->get();
            }
            // Akhir Warna

            // SKU produk  3
            if ($request->motif && $request->sku && $request->produk) {

                // $result = 'Motif sku produk';
                // dd($result);
                $result = Barang::where('sku', 'LIKE', '%' . $request->sku . '%')
                    ->where('produk', 'LIKE', '%' . $request->produk . '%')
                    ->where('motif', 'LIKE', '%' . $request->motif . '%')->get();
            }

            // Produk Motif produk 
            if ($request->brand && $request->sku && $request->produk) {
                // $result = 'Brand SKU Produk';
                // dd($result);
                $result = Barang::where('sku', 'LIKE', '%' . $request->sku . '%')
                    ->where('produk', 'LIKE', '%' . $request->produk . '%')
                    ->where('brand', 'LIKE', '%' . $request->brand . '%')->get();
            }

            // Produk Motif produk 
            if ($request->warna && $request->sku && $request->produk) {
                $result = 'Warna Sku Produk';
                dd($result);
                $result = Barang::where('sku', 'LIKE', '%' . $request->sku . '%')
                    ->where('produk', 'LIKE', '%' . $request->produk . '%')
                    ->where('warna', 'LIKE', '%' . $request->warna . '%')->get();
            }
            // Produk Motif produk 
            if ($request->size && $request->sku && $request->produk) {

                $result = Barang::where('sku', 'LIKE', '%' . $request->sku . '%')
                    ->where('produk', 'LIKE', '%' . $request->produk . '%')
                    ->where('size', 'LIKE', '%' . $request->motif . '%')->get();
            }

            // SKU  & MOTIF
            if ($request->motif && $request->sku && $request->brand) {

                $result = Barang::where('sku', 'LIKE', '%' . $request->sku . '%')
                    ->where('brand', 'LIKE', '%' . $request->brand . '%')
                    ->where('motif', 'LIKE', '%' . $request->motif . '%')->get();
            }
            if ($request->motif && $request->sku && $request->size) {

                $result = Barang::where('sku', 'LIKE', '%' . $request->sku . '%')
                    ->where('size', 'LIKE', '%' . $request->size . '%')
                    ->where('motif', 'LIKE', '%' . $request->motif . '%')->get();
            }
            if ($request->motif && $request->sku && $request->warna) {

                $result = Barang::where('sku', 'LIKE', '%' . $request->sku . '%')
                    ->where('warna', 'LIKE', '%' . $request->warna . '%')
                    ->where('motif', 'LIKE', '%' . $request->motif . '%')->get();
            }

            // SKU Brand
            if ($request->size && $request->sku && $request->brand) {

                $result = Barang::where('sku', 'LIKE', '%' . $request->sku . '%')
                    ->where('brand', 'LIKE', '%' . $request->brand . '%')
                    ->where('size', 'LIKE', '%' . $request->size . '%')->get();
            }
            if ($request->warna && $request->sku && $request->brand) {

                $result = Barang::where('sku', 'LIKE', '%' . $request->sku . '%')
                    ->where('brand', 'LIKE', '%' . $request->brand . '%')
                    ->where('warna', 'LIKE', '%' . $request->size . '%')->get();
            }

            // SKU WARNA

            if ($request->warna && $request->sku && $request->size) {
                $result = Barang::where('sku', 'LIKE', '%' . $request->sku . '%')
                    ->where('size', 'LIKE', '%' . $request->size . '%')
                    ->where('warna', 'LIKE', '%' . $request->size . '%')->get();
            }

            // SKU produk 
            if ($request->motif && $request->sku && $request->produk && $request->brand) {
                $result = Barang::where('sku', 'LIKE', '%' . $request->sku . '%')
                    ->where('produk', 'LIKE', '%' . $request->produk . '%')
                    ->where('motif', 'LIKE', '%' . $request->motif . '%')->get();
            }
            if ($request->motif && $request->sku && $request->produk && $request->warna) {
                $result = Barang::where('sku', 'LIKE', '%' . $request->sku . '%')
                    ->where('produk', 'LIKE', '%' . $request->produk . '%')
                    ->where('motif', 'LIKE', '%' . $request->motif . '%')
                    ->where('warna', 'LIKE', '%' . $request->warna . '%')
                    ->get();
            }
            if ($request->motif && $request->sku && $request->produk && $request->size) {
                $result = Barang::where('sku', 'LIKE', '%' . $request->sku . '%')
                    ->where('produk', 'LIKE', '%' . $request->produk . '%')
                    ->where('motif', 'LIKE', '%' . $request->motif . '%')
                    ->where('size', 'LIKE', '%' . $request->size . '%')
                    ->get();
            }

            // No SKU

            if ($request->motif && $request->warna && $request->produk && $request->size) {
                $result = Barang::where('warna', 'LIKE', '%' . $request->warna . '%')
                    ->where('produk', 'LIKE', '%' . $request->produk . '%')
                    ->where('motif', 'LIKE', '%' . $request->motif . '%')
                    ->where('size', 'LIKE', '%' . $request->size . '%')
                    ->get();
            }
            if ($request->motif && $request->brand && $request->produk && $request->size) {
                $result = Barang::where('brand', 'LIKE', '%' . $request->brand . '%')
                    ->where('produk', 'LIKE', '%' . $request->produk . '%')
                    ->where('motif', 'LIKE', '%' . $request->motif . '%')
                    ->where('size', 'LIKE', '%' . $request->size . '%')
                    ->get();
            }

            // NO Produk
            if ($request->motif && $request->warna && $request->sku && $request->size) {
                $result = Barang::where('warna', 'LIKE', '%' . $request->warna . '%')
                    ->where('sku', 'LIKE', '%' . $request->sku . '%')
                    ->where('motif', 'LIKE', '%' . $request->motif . '%')
                    ->where('size', 'LIKE', '%' . $request->size . '%')
                    ->get();
            }
            if ($request->motif && $request->brand && $request->sku && $request->size) {
                $result = Barang::where('brand', 'LIKE', '%' . $request->brand . '%')
                    ->where('sku', 'LIKE', '%' . $request->sku . '%')
                    ->where('motif', 'LIKE', '%' . $request->motif . '%')
                    ->where('size', 'LIKE', '%' . $request->size . '%')
                    ->get();
            }

            // NO Motif
            if ($request->produk && $request->warna && $request->sku && $request->size) {
                $result = Barang::where('warna', 'LIKE', '%' . $request->warna . '%')
                    ->where('sku', 'LIKE', '%' . $request->sku . '%')
                    ->where('produk', 'LIKE', '%' . $request->produk . '%')
                    ->where('size', 'LIKE', '%' . $request->size . '%')
                    ->get();
            }

            if ($request->produk && $request->brand && $request->sku && $request->size) {
                $result = Barang::where('brand', 'LIKE', '%' . $request->brand . '%')
                    ->where('sku', 'LIKE', '%' . $request->sku . '%')
                    ->where('produk', 'LIKE', '%' . $request->produk . '%')
                    // ->where('motif', 'LIKE', '%' . $request->motif . '%')
                    ->where('size', 'LIKE', '%' . $request->size . '%')
                    ->get();
            }

            // 5 Pencarian

            if ($request->produk && $request->motif && $request->brand && $request->sku && $request->size) {
                $result = Barang::where('brand', 'LIKE', '%' . $request->brand . '%')
                    ->where('sku', 'LIKE', '%' . $request->produk . '%')
                    ->where('produk', 'LIKE', '%' . $request->produk . '%')
                    ->where('motif', 'LIKE', '%' . $request->motif . '%')
                    ->where('size', 'LIKE', '%' . $request->size . '%')
                    ->get();
            }

            if ($request->produk && $request->motif && $request->brand && $request->sku && $request->warna) {
                $result = Barang::where('brand', 'LIKE', '%' . $request->brand . '%')
                    ->where('sku', 'LIKE', '%' . $request->produk . '%')
                    ->where('produk', 'LIKE', '%' . $request->produk . '%')
                    ->where('motif', 'LIKE', '%' . $request->motif . '%')
                    ->where('warna', 'LIKE', '%' . $request->warna . '%')
                    ->get();
            }

            if ($request->produk && $request->motif && $request->brand && $request->sku && $request->warna && $request->size) {
                $result = Barang::where('brand', 'LIKE', '%' . $request->brand . '%')
                    ->where('sku', 'LIKE', '%' . $request->produk . '%')
                    ->where('produk', 'LIKE', '%' . $request->produk . '%')
                    ->where('motif', 'LIKE', '%' . $request->motif . '%')
                    ->where('warna', 'LIKE', '%' . $request->warna . '%')
                    ->where('size', 'LIKE', '%' . $request->size . '%')
                    ->get();
            }

            return response()->json([
                'message' => 'Data Berhasil Di tambah',
                'data' =>  $data,
                'result' => $result
            ]);
        } else {
            return response()->json([
                'message' => 'Error Not Found',
            ]);
        }
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
