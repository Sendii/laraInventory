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
                          <th style="text-align: center;">Nama Peminjam. </th>
                          <th style="text-align: center;">Supplier</th>
                          <th style="text-align: center;">Nama Barang</th>
                          <th style="text-align: center;">Jml Barang</th>
                          <th style="text-align: center;">Keterangan</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($kode as $key)
                        <?php 
                        $nama = \App\Siswa::where('id', $key->id_siswa)->value('namalengkap');
                        $supplier = \App\Income::where('id', $key->id_barang)->value('nm_supplier');
                        $nama_barang = \App\Income::where('id', $key->id_barang)->value('nama_barang');
                        $jml_barang = \App\Income::where('id', $key->id_barang)->value('qty');
                         ?>
                        <tr>
                          <td style="text-align: center;">{{$key->id}}</td>
                          <td style="text-align: center;">{{$key->Siswa->namalengkap}}</td>
                          <td style="text-align: center;">
                            <a href="{{url('supplier', [$key->nm_supplier])}}">{{ $supplier }}</a></td>
                            <td style="text-align: center;">{{$nama_barang}}</td>
                            <td style="text-align: center;">{{$jml_barang}}
                             <br><i>-{{ $barang->jumlah_brg }}</i> <b>{{$barang->keterangan}}</b>
                            </td>
                            <td style="text-align: center;">
                              @if($key->keterangan == "Rusak")
                              <span class="label label-danger"><i class="fa fa-close"></i>&nbsp;{{ $key->keterangan }}
                              </span> <br>
                              @elseif($key->keterangan == "Hilang")
                              <span class="label label-warning"><i class="fa fa-close"></i>&nbsp;{{ $key->keterangan }}</span>
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