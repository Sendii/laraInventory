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
                  <h2 style="font-size: 25px" class="box-title">Data Peminjaman Kelas <br><i>{{$kelas->kelas}}</i></h2></center>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table id="example" class="table table-bordered table-hover" role="grid" aria-describedby="example1_info" data>
                      <thead>
                        <tr>
                          <th style="text-align: center;">No. </th>
                          <th style="text-align: center;">Nama Peminjam</th>
                          <th style="text-align: center;">Nama Barang</th>
                          <th style="text-align: center;">Jumlah Pinjaman</th>
                          <th style="text-align: center;">Keterangan Barang</th>
                          <th style="text-align: center;">Status</th>
                          <th style="text-align: center;">Waktu Peminjaman</th>
                          <th style="text-align: center;">Waktu Pengembalian</th>
                          <th style="text-align: center;">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($datas as $key)
                        <?php
                          $nama = \App\Siswa::where('id', $key->id_siswa)->value('namalengkap');
                          $kelas = \App\Siswa::where('id', $key->id_siswa)->value('id_kelas');
                          $getkelas = \App\Kelas::where('id', $kelas)->value('kelas');
                        ?>
                        <tr>
                          <td style="text-align: center;">{{$key->id}}</td>
                          <td style="text-align: center;">{{$nama}}</td>
                          <td style="text-align: center;">{{$key->nama_barang}}</td>
                          <td style="text-align: center;">{{$key->jumlahminjam}}</td>
                          <td style="text-align: center;">{{$key->keterangan}}</td>
                          <td style="text-align: center;">{{$key->status}}</td>
                          <td style="text-align: center;">{{$key->created_at}}</td>
                          <td style="text-align: center;">{{$key->waktukembali}}</td>
                          <td style="text-align: center;">
                            @if($key->status == "Meminjam")
                            <a href="{{url('barang/pengembalian/'.$key->id)}}"><button class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                            @elseif($key->status == "Sudah Dikembalikan")
                            <b><i> - </i></b>
                            @endif
                          </td>
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