@extends('layouts.adminlte')
@include('layouts.sidebar')
<!DOCTYPE html>
<html>
<head>
  <title>Homepage</title>
</head>
<link rel="stylesheet" href="{{asset('css/morris.css')}}">
<style type="text/css">
.center {
  text-align: center;
}
</style>
<body>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard<i class="ion ion-ios-arrow-right"></i>
        @if(Auth::user() && Auth::user()->akses == 'Admin')
        <i><a href="{{url('admin')}}">Admin</a></i>
        @else
        <a href="{{url('userspeople')}}">User</a>
        @endif
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard <b><i>{{Auth::user()->akses}}</i></b> </li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-lg-3 col-xs-8">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3>{{count(\App\Siswa::all())}}</h3>

              <p>Total Siswa</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-person"></i>
            </div>
            @if(Auth::user() && Auth::user()->akses == 'Admin')
            <a href="{{url('pelanggan')}}" class="small-box-footer">Informasi Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
            @elseif (Auth::user() && Auth::user()->akses == 'User')
            <a href="#pelanggan" class="small-box-footer">Informasi Selengkapnya <i class="fa fa-arrow-circle-right"></i></a> 
            @endif
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
             <h3>{{count(\App\Income::all())}}</h3>
             <p>Total Barang</p>
           </div>
           <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="{{url('barang')}}" class="small-box-footer">Informasi Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>{{count(\App\User::all())}}</h3>

            <p>Total Pengguna</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-people"></i>
          </div>
          @if(Auth::user() && Auth::user()->akses == 'Admin')
          <a href="{{url('pengguna')}}" class="small-box-footer">Informasi Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          @else
          <a href="#pengguna" class="small-box-footer">Informasi Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          @endif
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>{{count(\App\Supplier::all())}}</h3>
            <p>Total Supplier</p>
          </div>
          <div class="icon">
            <i class="ion ion-archive"></i>
          </div>
          @if(Auth::user() && Auth::user()->akses == 'Admin')
          <a href="{{url('supplier')}}" class="small-box-footer">Informasi Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          @else
          <a href="#supplier" class="small-box-footer">Informasi Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          @endif
        </div>
      </div>
    </div>
    <!-- data ppbj baru dan user baru -->
    <div class="row">

      <div class="col-md-8">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Data Barang Baru</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table id="example" class="table table-bordered table-hover" role="grid" aria-describedby="example1_info" data>
                <thead>
                  <tr>
                    <th style="text-align: center;">No. </th>
                    <th style="text-align: center;">Supplier</th>
                    <th style="text-align: center;">Kode Barang</th>
                    <th style="text-align: center;">Nama Barang</th>
                    <th style="text-align: center;">Stock Barang</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($barangs as $key)
                  <tr>
                    <td style="text-align: center;">{{$key->id}}</td>
                    <td style="text-align: center;">
                      <a href="{{url('supplier', [$key->nm_supplier])}}">{{ $key->nm_supplier }}</a></td>
                      <td style="text-align: center;">{{$key->kode_barang}}</td>
                      <td style="text-align: center;">{{$key->nama_barang}}</td>
                      <td style="text-align: center;">{{$key->qty}}</td>
                      <!-- <br>=> Rp. {{ $key->hargatotal_brg }} -->
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Pengguna Terbaru</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              @foreach($users as $user)
              <?php $outlet = \App\Pelanggan::where('id', $user->id_outlet)->value('nama_outlet'); ?>
              <ul class="products-list product-list-in-box">
                <li class="item">
                  <div class="product-img">
                    <img class="img-circle" src="/uploads/avatar/defaults.jpg" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">{{ $user->name }}
                      r                    <span class="label label-info pull-right">{{ $outlet }}</span></a>
                      <span class="product-description">
                        E-Mail: <b><i>{{ $user->email }}</i></b>
                      </span>
                    </div>
                  </li>
                  <!-- /.item -->
                  <!-- /.item -->
                </ul>
                @endforeach
              </div>
              <!-- /.box-body -->
              <div class="box-footer text-center">
                <a href="{{url('pengguna')}}" class="uppercase">Lihat Semua Pengguna</a>
              </div>
              <!-- /.box-footer -->
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Left col -->
          <div class="col-md-12">
            <!-- MAP & BOX PANE -->
            <div class="col-md-12 col-sm-8">
              <div class="pad"><hr>
                <div class="pull-right">
                  <b>Version</b> 1.0.3
                </div>
                <strong>Powered &copy; 2018 <a href="#">PklTeam</a>.</strong> All rights
                reserved.
              </div>
            </div>
            <div class="row">

              <div class="col-md-12">
              </div>

            </div>

          </section>
        </div>
        <script type="text/javascript" src="{{asset('js/datatable/jquery.dataTables.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/datatable/dataTables.bootstrap.min.js')}}"></script>
        <script src="{{asset('js/sweetalert.min.js')}}"></script>
        <script type="text/javascript">
          $(document).ready(function() {
            $('#example').DataTable();
          });
        </script>
      </body>
      </html>
