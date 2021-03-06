<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Barang;
use App\Models\Pembeli;
use DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function barang()
    {
        $barang = Barang::all();
        return response()->json([
            'success' => true,
            'message' => 'Data barang',
            'data' => $barang,
        ], 200);
    }

    public function pembeli()
    {
        $pembeli = Pembeli::all();
        return response()->json([
            'success' => true,
            'message' => 'Data pembeli',
            'data' => $pembeli,
        ], 200);
    }


    public function index()
    {
        // $artikel = Article::with('category')->get();
        $transaksi = DB::table('transaksi')
            ->join('barang', 'transaksi.id_barang', '=', 'id_barang')
            ->join('pembeli', 'transaksi.id_pembeli', '=', 'id_pembeli')
            ->select('pembeli.nama_pembeli', 'barang.nama_barang', 'transaksi.tanggal_beli', 'transaksi.harga', 'transaksi.jumlah', 'transaksi.total')
            ->get();
        return response()->json([
            'success' => true,
            'message' => 'data transaksi',
            'data' => $transaksi,
        ], 200);
        // $barang = Barang::all();
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Data barang',
        //     'data' => $barang,
        // ], 200);
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
            'success' => true,
            'message' => 'Data Transaksi Berhasil dibuat',
            'data' => $transaksi,
        ], 201);
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
        return response()->json([
            'success' => true,
            'message' => 'Show Data Transaksi',
            'data' => $transaksi,
        ], 200);
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
            'success' => true,
            'message' => 'Data Transaksi Berhasil diedit',
            'data' => $transaksi,
        ], 201);
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
        $transaksi->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Transaksi Berhasil dihapus',
            'data' => $transaksi,
        ], 200);
    }
}
