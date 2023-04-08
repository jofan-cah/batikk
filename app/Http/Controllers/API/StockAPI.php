<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ModelStok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockAPI extends Controller
{
    public function index()
    {
        $data = DB::table('stok')
            // ->join('users', 'users.id', '=', 'stok.updat')
            ->get();
        return response()->json([
            'message' => 'Data Stock oyyyy',
            'data' => $data,

        ]);
    }

    public function simpan(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'sku' => 'required',
            'qty' => 'required',
            'kat' => 'required',
            'sat' => 'required',
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
            'sku' => $request->sku,
            'qty' => $request->qty,
            'kat' => $request->kat,
            'sat' => $request->sat,
            'updat' => $request->updat,
        ];
        ModelStok::create($data);

        return response()->json([
            'message' => 'Data Stock berhasil di tambah',


        ]);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sku' => 'required',
            'qty' => 'required',
            'kat' => 'required',
            'sat' => 'required',
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
            'sku' => $request->sku,
            'qty' => $request->qty,
            'kat' => $request->kat,
            'sat' => $request->sat,
            'updat' => $request->updat,
        ];

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        ModelStok::find($id)->update($data);

        return response()->json([
            'message' => 'Data Stock berhasil di update',
            'data' => $data,

        ]);
    }

    public function show($id)
    {
        $stok = ModelStok::find($id);

        if ($stok) {
            return response()->json([
                'message' => 'Data di temukan',
                'data' => $stok
            ]);
        } else {
            return response()->json([
                'message' => 'Data not found !'
            ], 422);
        }
    }
    public function destroy($id)
    {
        ModelStok::find($id)->delete();

        return response()->json([
            'message' => 'Data Stock bergasil di hapus',


        ]);
    }
}
