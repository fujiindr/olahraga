<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class ApiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();

        // where('id', 2)->get();

        // if ($user->count() >= 1) {

            return response()->json([
                'status' => true,
                'code' => 200,
                'message' => 'berhasil',
                'data' => $user,
            ]);

        // } else{

        //     return response()->json([
        //         'status' => true,
        //         'code' => 404,
        //         'message' => 'gagal',
        //         'data' => $user,
        //     ]);
        // }


    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json([
            'status' => true,
            'code' => 201,
            'message' => 'Data User Berhasil Dibuat',
            'data' => $user,
        ]);

    }


    public function show($id)
    {
        $user = User::find($id);
        if ($user) {
            return response()->json([
                'status' => true,
                'code' => 200,
                'message' => 'Show Data User',
                'data' => $user,
            ]);

        } else {
            return response()->json([
                'status' => false,
                'code' => 404,
                'message' => 'Data User Tidak Ditemukan',
                'data' => [],
            ]);
        }
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            return response()->json([
                'status' => true,
                'code' => 201,
                'message' => 'Data User Berhasil Dibuat',
                'data' => $user,
            ]);

        } else {
            return response()->json([
                'status' => false,
                'code' => 404,
                'message' => 'Data User Tidak Ditemukan',
                'data' => [],
            ]);
        }
    }


    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json([
                'status' => true,
                'code' => 200,
                'message' => 'Data User Berhasil Di hapus',
                'data' => $user,
            ]);

        } else {
            return response()->json([
                'status' => false,
                'code' => 404,
                'message' => 'Data User Tidak Ditemukan',
                'data' => [],
            ]);
        }
    }
}
