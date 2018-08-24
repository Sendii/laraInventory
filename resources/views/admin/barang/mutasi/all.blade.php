<!DOCTYPE html>
<html>

<head>
  @extends('layouts.adminlte')
</head>
<style type="text/css">
.center {
  text-align: center;
}
</style>
<?php
$_requestUrl = basename($_SERVER['REQUEST_URI']);
?>
<link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert.css')}}">
<body class="hold-transition skin-blue sidebar-mini">
  @include('layouts.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-fluid spark-screen">
      <div class="row">
        <br>
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <center>
                <center>
                  <h2 style="font-size: 25px" class="box-title">Data Barang</h2></center>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table id="example" class="table table-bordered table-hover" role="grid" aria-describedby="example1_info" data>
                      <thead>
                        <tr>
                          <th style="text-align: center;">No. </th>
                          <th style="text-align: center;">Penerima. </th>
                          <th style="text-align: center;">Supplier </th>
                          <th style="text-align: center;">Kode Barang</th>
                          <th style="text-align: center;">Nama Barang</th>
                          <th style="text-align: center;">Jumlah Barang</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($mutasibarangs2 as $key)
                        <tr>
                          <td style="text-align: center;">{{$key->id}}</td>
                          <td style="text-align: center;"><a href="{{url('barang/mutasi', [$key->id_pelanggan])}}">{{$key->Pelanggan->nama_outlet}}</a></td>
                          @if (Auth::user() && Auth::user()->akses == 'Admin')
                          <td style="text-align: center;">
                            <a href="{{url('supplier', [$key->nm_supplier])}}">{{ $key->nm_supplier }}</a></td>
                            @endif
                            <td style="text-align: center;">{{$key->kode_barang}}</td>
                            <td style="text-align: center;">{{$key->nama_barang}}</td>
                            <td style="text-align: center;">{{$key->qty}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
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