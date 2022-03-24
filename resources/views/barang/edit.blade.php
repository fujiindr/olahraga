@extends('adminlte::page')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Edit Data Barang</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Barang</div>
                <div class="card-body">
                    <form action="{{route('barang.update',$barang->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">Masukan Nama</label>
                            <input type="text" name="nama_barang" value="{{$barang->nama_barang}}" class="form-control @error('name') is-invalid @enderror">
                            @error('nama_barang')
                            <span class="invalid-feedback" role="alert"></span>
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Kategori</label>
                            <select name="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror">
                                @foreach ($kategori as $key)
                                <option value="{{$key->id}}">{{$key->nama_kategori}}</option>
                                @endforeach
                            </select>

                            {{-- <input type="text" name="nama_kategori" class="form-control @error('nama_kategori') is-invalid @enderror">
                            @error('nama_kategori')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror --}}
                        </div>

                        <div class="form-group">
                            <label for="">Masukan Stok</label>
                            <input type="number" name="stok" value="{{$barang->stok}}" class="form-control @error('name') is-invalid @enderror">
                            @error('stok')
                            <span class="invalid-feedback" role="alert"></span>
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Deskripsi</label>
                            <input type="text" name="deskripsi" value="{{$barang->deskripsi}}" class="form-control @error('name') is-invalid @enderror">
                            @error('deskripsi')
                            <span class="invalid-feedback" role="alert"></span>
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Harga</label>
                            <input type="text" name="harga" value="{{$barang->harga}}" class="form-control @error('name') is-invalid @enderror">
                            @error('harga')
                            <span class="invalid-feedback" role="alert"></span>
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Gambar </label>
                            <input type="file" id="cover" name="cover" value="{{$barang->cover}}" class="form-control @error('cover') is-invalid @enderror">
                            @error('cover')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="reset" class="btn btn-outline-danger">Reset</button>
                            <button type="submit" class="btn btn-outline-warning">Simpan</button>
                            <a href="{{url('admin/barang')}}" class="btn btn-outline-info">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

