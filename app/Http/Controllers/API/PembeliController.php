<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pembeli;
use Illuminate\Http\Request;

class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembeli = Pembeli::all();

        // where('id', 2)->get();

        // if ($Pembeli->count() >= 1) {

        return response()->json([
            'status' => true,
            'code' => 200,
            'message' => 'berhasil',
            'data' => $pembeli,
        ]);

        // } else{

        //     return response()->json([
        //         'status' => true,
        //         'code' => 404,
        //         'message' => 'gagal',
        //         'data' => $Pembeli,
        //     ]);
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pembeli = Pembeli::find($id);
            $pembeli->nama_pembeli = $request->nama_pembeli;
            $pembeli->alamat = $request->alamat;
            $pembeli->no_hp = $request->no_hp;
            $pembeli->email = $request->email;
            $pembeli->save();
            return response()->json([
                'status' => true,
                'code' => 201,
                'message' => 'Data Pembeli Berhasil Dibuat',
                'data' => $pembeli,
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pembeli = Pembeli::find($id);
        if ($pembeli) {
            return response()->json([
                'status' => true,
                'code' => 200,
                'message' => 'Show Data Pembeli',
                'data' => $pembeli,
            ]);

        } else {
            return response()->json([
                'status' => false,
                'code' => 404,
                'message' => 'Data Pembeli Tidak Ditemukan',
                'data' => [],
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pembeli = Pembeli::find($id);
        if ($pembeli) {
            $pembeli->nama_pembeli = $request->nama_pembeli;
            $pembeli->alamat = $request->alamat;
            $pembeli->no_hp = $request->no_hp;
            $pembeli->email = $request->email;
            $pembeli->save();
            return response()->json([
                'status' => true,
                'code' => 201,
                'message' => 'Data Pembeli Berhasil Dibuat',
                'data' => $pembeli,
            ]);

        } else {
            return response()->json([
                'status' => false,
                'code' => 404,
                'message' => 'Data Pembeli Tidak Ditemukan',
                'data' => [],
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembeli = Pembeli::find($id);
        if ($pembeli) {
            $pembeli->delete();
            return response()->json([
                'status' => true,
                'code' => 200,
                'message' => 'Data Pembeli Berhasil Di hapus',
                'data' => $pembeli,
            ]);

        } else {
            return response()->json([
                'status' => false,
                'code' => 404,
                'message' => 'Data Pembeli Tidak Ditemukan',
                'data' => [],
            ]);
        }
    }
}
