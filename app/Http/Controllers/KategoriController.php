<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
	public function index()
	{
		$kategori = Kategori::all();

		return view('kategori/index', ['kategori' => $kategori]);
	}

	public function tambah()
	{
		$result = DB::table('barang')
			// ->join('barang', 'barang.sku', '=', 'kategori.sku')
			->get();
		return view('kategori.form', [
			'result' => $result
		]);
	}



	public function simpan(Request $request)
	{
		$validatedData = $request->validate([
			'sku' => 'required',
			'harga' => 'required',
			'diskon' => 'required',
			'tgl_berlaku' => 'required',
			'kode_cp' => 'required',
			'tgl_del' => 'required',
			'diskon_psn' => 'required',
			'updat' => 'required',

		]);
		Kategori::create($validatedData);

		return back()->with('success', 'User created successfully.');
	}

	public function edit($id_harga)
	{


		$kategori = Kategori::find($id_harga);

		return view('kategori.form', ['kategori' => $kategori]);
	}

	public function update($id_harga, Request $request)
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
