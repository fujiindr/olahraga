<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pembeli;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    //
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
        return view('transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $barang = Barang::all();
        $pembeli = Pembeli::all();
        return view('transaksi.create', compact('barang', 'pembeli'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pembeli' => 'required',
            'id_barang' => 'required',
            // 'alamat' => 'required',
            'tanggal_beli' => 'required',
            'jumlah' => 'required',
            // 'uang' => 'required',

        ]);

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
        return redirect()->route('transaksi.index');
    }

    //if ($request->hasFile('cover')){
    //    $transaksi->deleteImage();
    //    $image = $request->file('cover');
    //    $name = rand(1000, 9999) . $image->getClientOriginalName();
    //    $image->move('images/transaksi', $name);
    //    $transaksi->cover = $name;
    //}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $transaksi = Transaksi::findOrFail($id);
        $barang = Barang::all();
        $pembeli = Pembeli::all();
        return view('transaksi.edit', compact('transaksi', 'barang', 'pembeli'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //validasi data
        $validated = $request->validate([
            'id_pembeli' => 'required',
            'id_barang' => 'required',
            // 'alamat' => 'required',
            'tanggal_beli' => 'required',
            'jumlah' => 'required',
            // 'uang' => 'required',

        ]);

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
        return redirect()->route('transaksi.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        return redirect()->route('transaksi.index');
    }
}
