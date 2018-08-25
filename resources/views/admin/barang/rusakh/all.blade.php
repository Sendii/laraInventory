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
                  <h2 style="font-size: 25px" class="box-title">Data Barang Bermasalah</h2></center>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table id="example" class="table table-bordered table-hover" role="grid" aria-describedby="example1_info" data>
                      <thead>
                        <tr>
                          <th style="text-align: center;">No. </th>
                          <th style="text-align: center;">Nama Peminjam</th>
                          <th style="text-align: center;">Kode Barang</th>
                          <th style="text-align: center;">Nama Barang</th>
                          <th style="text-align: center;">Jumlah Barang</th>
                          <th style="text-align: center;">Tgl Peminjaman/Pengembalian</th>
                          <th style="text-align: center;">Keterangan</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($rusakh as $key)
                        <tr>
                          <td style="text-align: center;">{{ $key->id }}</td>
                          <td style="text-align: center;">
                            <a href="{{url('barang/history/nama', [$key->Siswa->namalengkap])}}">{{ $key->Siswa->namalengkap }}</a></td>
                            <td style="text-align: center;"><a href="{{url('barang2', [$key->Barang->kode_barang])}}">{{ $key->Barang->kode_barang }}</a></td>
                            <td style="text-align: center;">{{ $key->Barang->nama_barang}}</td>
                            <td style="text-align: center;">{{$key->jumlah_brg}}</td>
                            <td style="text-align: center;">{{$key->Peminjam->created_at."/".$key->Peminjam->waktukembali}}</td>
                            <td style="text-align: center;">
                              @if($key->keterangan == "Hilang")
                              <span class="label label-danger"><i class="fa fa-close"></i>&nbsp;{{ $key->keterangan }}</span>
                              @elseif($key->keterangan == "Rusak")
                              <span class="label label-warning"><i class="fa fa-close"></i>&nbsp;{{ $key->keterangan }}</span>
                              @elseif(is_null($key->keterangan))
                              <span class="label label-warning"><i class="fa fa-warning"></i>&nbsp;{{ $key->status }}</span>
                              @endif
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="modal fade in" id="modal-addbarang" style="padding-right: 15px;">
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