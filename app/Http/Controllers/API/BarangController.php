<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        return response()->json([
            'status' => true,
            'code' => 200,
            'message' => 'berhasil',
            'data' => $barang,
        ]);
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
        $image = $request->cover;
        $name = $image->getClientOriginalName();

        $barang = new Barang;
        $barang->id_kategori = $request->id_kategori;
        $barang->nama_barang = $request->nama_barang;
        // $barang->nama_kategori = $request->nama_kategori;
        $barang->stok = $request->stok;
        $barang->deskripsi = $request->deskripsi;
        $barang->harga = $request->harga;
        $barang->cover = $name;

        // $image->move(public_path().' images/alat', $name);
        if ($request->hasFile('cover')) {
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/barang/', $name);
            $barang->cover = $name;
        }
        $barang->save();
        return response()->json([
            'status' => true,
            'code' => 201,
            'message' => 'Data Barang Berhasil Dibuat',
            'data' => $barang,
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
        $barang = Barang::findOrFail($id);
        if ($barang) {
            return response()->json([
                'status' => true,
                'code' => 200,
                'message' => 'Show Data Barang',
                'data' => $barang,
            ]);

        } else {
            return response()->json([
                'status' => false,
                'code' => 404,
                'message' => 'Data Barang Tidak Ditemukan',
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
        if ($barang){
        $image = $request->cover;
        $name = $image->getClientOriginalName();

        $barang = new Barang;
        $barang = Barang::findOrFail($id);
        // $kategori = Kategori::all();
        $barang->id_kategori = $request->id_kategori;
        $barang->nama_barang = $request->nama_barang;
        // $barang->nama_kategori = $request->nama_kategori;
        $barang->stok = $request->stok;
        $barang->deskripsi = $request->deskripsi;
        $barang->harga = $request->harga;
        $barang->cover = $name;

        // $image->move(public_path().' images/alat', $name);
        if ($request->hasFile('cover')) {
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/barang/', $name);
            $barang->cover = $name;
        }
        $barang->save();
        return response()->json([
            'status' => true,
            'code' => 201,
            'message' => 'Data User Berhasil Dibuat',
            'data' => $barang,
        ]);
        }
        else {
            return response()->json([
                'status' => false,
                'code' => 404,
                'message' => 'Data User Tidak Ditemukan',
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
        $barang = Barang::find($id);
        if ($barang) {
            $barang->delete();
            return response()->json([
                'status' => true,
                'code' => 200,
                'message' => 'Data barang Berhasil Di hapus',
                'data' => $barang,
            ]);

        } else {
            return response()->json([
                'status' => false,
                'code' => 404,
                'message' => 'Data barang Tidak Ditemukan',
                'data' => [],
            ]);
        }
    }
}
