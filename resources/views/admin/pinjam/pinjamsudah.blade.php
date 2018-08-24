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
                  @if($_requestUrl == "sudah")
                  <h2 style="font-size: 25px" class="box-title">Data Peminjaman Sudah Dikembalikan</h2></center>
                  @elseif($_requestUrl == "belum")
                  <h2 style="font-size: 25px" class="box-title">Data Peminjaman Belum Dikembalikan</h2></center>
                  @endif
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table id="example" class="table table-bordered table-hover" role="grid" aria-describedby="example1_info" data>
                      <thead>
                        <tr>
                          <th style="text-align: center;">No. </th>
                          <th style="text-align: center;">Nama Siswa</th>
                          <th style="text-align: center;">Nama Barang</th>
                          <th style="text-align: center;">Jumlah Pinjaman</th>
                          <th style="text-align: center;">Keterangan Barang</th>
                          <th style="text-align: center;">Status</th>
                          <th style="text-align: center;">Waktu Peminjaman</th>
                          <th style="text-align: center;">Waktu Pengembalian</th>
                        </tr>
                      </thead>
                      @if($_requestUrl == "sudah")
                      <tbody>
                        @foreach($peminjamansudah as $key)
                        <?php
                          $nama = \App\Siswa::where('id', $key->id_siswa)->value('namalengkap');
                          $kelas = \App\Siswa::where('id', $key->id_siswa)->value('id_kelas');
                          $getkelas = \App\Kelas::where('id', $kelas)->value('kelas');
                        ?>
                        <tr>
                          <td style="text-align: center;">{{$key->id}}</td>
                          <td style="text-align: center;">
                            <a href="{{url('barang/history/nama', [$nama])}}">{{ $nama }}</a>
                            <b><i><br>=> {{ $getkelas }}</i></b>
                          </td>
                          <td style="text-align: center;">{{$key->Barang->nama_barang}}
                            <span><a href="{{url('barang2', [$key->Barang->kode_barang])}}">{{$key->Barang->kode_barang}}</a></span></td>
                          <td style="text-align: center;">{{$key->jumlahminjam}}</td>
                          <td style="text-align: center;">{{$key->keterangan}}</td>
                          <td style="text-align: center;">{{$key->status}}</td>
                          <td style="text-align: center;">{{$key->created_at}}</td>
                          <td style="text-align: center;">
                            @if(is_null($key->waktukembali))
                            <span><b><i> - </i></b></span>
                          @else
                          <span>{{$key->waktukembali}}</span>
                        @endif
                        </tr>
                        @endforeach
                      </tbody>
                      @elseif($_requestUrl == "belum")
                      <tbody>
                        @foreach($peminjamanbelum as $key)
                        <?php
                          $nama = \App\Siswa::where('id', $key->id_siswa)->value('namalengkap');
                          $kelas = \App\Siswa::where('id', $key->id_siswa)->value('id_kelas');
                          $getkelas = \App\Kelas::where('id', $kelas)->value('kelas');
                        ?>
                        <tr>
                          <td style="text-align: center;">{{$key->id}}</td>
                          <td style="text-align: center;">
                            <a href="{{url('barang/history/nama', [$nama])}}">{{ $nama }}</a>
                            <b><i><br>=> {{ $getkelas }}</i></b>
                          </td>
                          <td style="text-align: center;">{{$key->nama_barang}}</td>
                          <td style="text-align: center;">{{$key->jumlahminjam}}</td>
                          <td style="text-align: center;">{{$key->keterangan}}</td>
                          <td style="text-align: center;">{{$key->status}}</td>
                          <td style="text-align: center;">{{$key->created_at}}</td>
                          <td style="text-align: center;">
                            @if(is_null($key->waktukembali))
                            <span><b><i> - </i></b></span>
                          @else
                          <span>{{$key->waktukembali}}</span>
                        @endif
                        </tr>
                        @endforeach
                      </tbody>
                      @endif
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