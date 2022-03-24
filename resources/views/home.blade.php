@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<center><b>SELAMAT DATANG DITOKO KAMI</b></center><br>

@endsection

@section('content')

<!-- Main content -->
<section class="content">
    <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="{{route('kategori.index')}}">
            <div class="small-box bg-info">
              <div class="inner">
              <h3>{{ $kategori }}</h3>
                <p>Total Kategori</p>
              </div>
              <div class="icon">
                <i class="ion far far-fw fad fa-list-alt"></i>
              </div>
            </div>
            </a>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="{{route('pembeli.index')}}">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $pembeli }}</h3>
                <p>Total Pembeli</p>
              </div>
              <div class="icon">
                <i class="ion far far-fw fas fa-user"></i>
              </div>
            </div>
            </a>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="{{route('barang.index')}}">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $barang }}</h3>
                <p>Total Barang</p>
              </div>
              <div class="icon">
                <i class="ion far far-fw fas fa-box-open"></i>
              </div>
            </div>
            </a>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="{{route('transaksi.index')}}">
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>{{ $transaksi }}</h3>
                <p>Total Transaksi</p>
              </div>
              <div class="icon">
                <i class="ion far-fw far fa-handshake"></i>
              </div>
            </div>
            </a>
          </div>
          <!-- ./col -->
        </div>

        {{-- <div class="col-lg-6">
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Sales</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex">
                        <p class="d-flex flex-column">
                            <span class="text-bold text-lg">$18,230.00</span>
                            <span>Sales Over Time</span>
                        </p>
                        <p class="ml-auto d-flex flex-column text-right">
                            <span class="text-success">
                                <i class="fas fa-arrow-up"></i> 33.1%
                            </span>
                            <span class="text-muted">Since last month</span>
                        </p>
                    </div>
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="sales-chart" height="200" style="display: block; width: 642px; height: 200px;" width="642" class="chartjs-render-monitor">
                    </canvas> --}}



      <!-- /.row -->
      <!-- Main row -->
      {{-- <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">CPU Traffic</span>
                <span class="info-box-number">
                  10
                  <small>%</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Likes</span>
                <span class="info-box-number">41,410</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sales</span>
                <span class="info-box-number">760</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">New Members</span>
                <span class="info-box-number">2,000</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div> --}}

@endsection

@section('css')

@endsection

@section('js')

@endsection
