<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelStok;

class StockController extends Controller
{
    public function index()
    {
        $stock = ModelStok::all();
        return view('stock/index', ['stock' => $stock]);
    }

    public function tambah()
    {
        return view('stock.form');
    }
    public function simpan(Request $request)
    {
        $validatedData = $request->validate([
            'sku' => 'required',
            'qty' => 'required',
            'kat' => 'required',
            'sat' => 'required',
            'updat' => 'required',
        ]);

        ModelStok::create($validatedData);

        return back()->with('success', 'User created successfully.');
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
        $data = [
            'sku' => $request->sku,
            'qty' => $request->qty,
            'kat' => $request->kat,
            'sat' => $request->sat,
            'updat' => $request->updat,
        ];
        ModelStok::find($id)->update($data);

        return redirect()->route('stock');
    }
    public function edit($id)
    {

        $stock = ModelStok::find($id);

        return view('stock.form', ['stock' => $stock]);
    }
    public function hapus($id)
    {
        ModelStok::find($id)->delete();

        return redirect()->route('stock');
    }
}
