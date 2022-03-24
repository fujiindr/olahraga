<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::With('pembeli', 'barang')->get();
        // $barang = Barang::all();
        // $pembeli = Pembeli::all();
        return response()->json([
            'status' => true,
            'code' => 200,
            'message' => 'berhasil',
            'data' => $transaksi,
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
        $transaksi = new Transaksi;
        $transaksi->id_pembeli = $request->id_pembeli;
        $transaksi->id_barang = $request->id_barang;
        $sisa_stok = Barang::findOrfail($request->id_barang);
        if ($request->jumlah > $sisa_stok->stok) {
            // Session::flash("flash_notification", [
            //     "level" => "danger",
            //     "massage" => "Stok Kurang",
            // ]);
            return redirect()->route('transaksi.index');
        } elseif ($request->jumlah < 0) {
            // Session::flash("flash_notification", [
            //     "level" => "danger",
            //     "massage" => "Jumlah Tidak Boleh Negatif",
            // ]);
            return redirect()->back();
        } else {

        }
        $sisa_stok->stok -= $request->jumlah;
        $sisa_stok->save();
        $transaksi->jumlah = $request->jumlah;
        // $transaksi->alamat = $request->alamat;
        $transaksi->tanggal_beli = $request->tanggal_beli;
        $price = Barang::findOrfail($request->id_barang);
        // $transaksi->uang = $request->uang;
        // $transaksi->kembali = $transaksi->uang - $transaksi->total;
        $transaksi->harga = $price->harga;
        $transaksi->total = $price->harga * $request->jumlah;
        $transaksi->save();
        return response()->json([
            'status' => true,
            'code' => 201,
            'message' => 'Data Transaksi Berhasil Dibuat',
            'data' => $transaksi,
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
        $transaksi = Transaksi::findOrFail($id);
        if ($transaksi) {
            return response()->json([
                'status' => true,
                'code' => 200,
                'message' => 'Show Data Transaksi',
                'data' => $transaksi,
            ]);

        } else {
            return response()->json([
                'status' => false,
                'code' => 404,
                'message' => 'Data Transaksi Tidak Ditemukan',
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
        $transaksi = new Transaksi;
        $transaksi = Transaksi::findOrfail($id);
        if ($transaksi){
        $transaksi->id_pembeli = $request->id_pembeli;
        $transaksi->id_barang = $request->id_barang;
        $sisa_stok = Barang::findOrfail($request->id_barang);
        if ($request->jumlah > $sisa_stok->stok) {
            // Session::flash("flash_notification", [
            //     "level" => "danger",
            //     "massage" => "Stok Kurang",
            // ]);
            return redirect()->route('transaksi.index');
        } elseif ($request->jumlah < 0) {
            // Session::flash("flash_notification", [
            //     "level" => "danger",
            //     "massage" => "Jumlah Tidak Boleh Negatif",
            // ]);
            return redirect()->back();
        } else {

        }

        $sisa_stok->stok -= $request - l > jumlah;
        $sisa_stok->save();
        $transaksi->jumlah = $request->jumlah;
        // $transaksi->alamat = $request->alamat;
        $transaksi->tanggal_beli = $request->tanggal_beli;
        $price = Barang::findOrfail($request->id_barang);
        // $transaksi->uang = $request->uang;
        // $transaksi->kembali = $transaksi->uang - $transaksi->total;
        $transaksi->harga = $price->harga;
        $transaksi->total = $price->harga * $request->jumlah;
        $transaksi->save();
            return response()->json([
                'status' => true,
                'code' => 201,
                'message' => 'Data User Berhasil Dibuat',
                'data' => $transaksi,
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
        $transaksi = Transaksi::findOrFail($id);
        if ($transaksi) {
            $transaksi->delete();
            return response()->json([
                'status' => true,
                'code' => 200,
                'message' => 'Data Transaksi Berhasil Di hapus',
                'data' => $transaksi,
            ]);

        } else {
            return response()->json([
                'status' => false,
                'code' => 404,
                'message' => 'Data Trasaksi Tidak Ditemukan',
                'data' => [],
            ]);
        }
    }
}
