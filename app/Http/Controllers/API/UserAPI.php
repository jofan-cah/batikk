<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserAPI extends Controller
{

    public function index()
    {
        $user = User::all();
        return response()->json([
            'message' => 'data user',
            'data' => $user,

        ]);
    }

    public function show($id)
    {
        $user = User::find($id);

        if ($user) {
            return response()->json([
                'message' => 'Data di temukan',
                'data' => $user
            ]);
        } else {
            return response()->json([
                'message' => 'Data not found !'
            ], 422);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string',
            'level' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->level = $request->level;

        $user->save();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'data' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string',
            'level' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    'message' => 'Error',
                    'eroors' => $validator->errors()
                ]
            );
        }


        $user = User::find($id);
        if ($user) {
            $user->barang = $request->barang;
            $user->harga = $request->harga;

            $user->save();

            return response()->json([
                'message' => 'Berhasil di Ubah ' . $id,
                'data' => $user,
            ]);
        } else {
            return response()->json([
                'message' => 'Data not Found !'
            ]);
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();

            return response()->json([
                'message' => 'sukses',
                'data' => $id

            ]);
        } else {
            return response()->json([
                'message' => 'Data not Found !'
            ]);
        }
    }
}
