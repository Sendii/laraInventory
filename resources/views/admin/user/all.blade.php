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
                  <h2 style="font-size: 25px" class="box-title">Data user</h2></center>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table id="example" class="table table-bordered table-hover" role="grid" aria-describedby="example1_info" data>
                      <thead>
                        <tr>
                          <th style="text-align: center;">No. </th>
                          <th style="text-align: center;">Nama user</th>
                          <th style="text-align: center;">Outlet</th>
                          @if (Auth::user() && Auth::user()->akses == 'Admin')
                          <th style="text-align: center;">Action</th>
                          @endif
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($users as $key)
                        <?php
                          $outlet = \App\Pelanggan::where('id', $key->id_outlet)->value('nama_outlet');
                        ?>
                        <tr>
                          <td style="text-align: center;">{{$key->id}}</td>
                          <td style="text-align: center;">{{$key->name}}</td>
                          @if($outlet == "")
                          <td style="text-align: center;"> - </td>
                          @else
                          <td style="text-align: center;">{{ $key->Outlet->nama_outlet }}</td>
                          @endif
                          @if (Auth::user() && Auth::user()->akses == 'Admin')
                          <td style="text-align: center;">
                            <a href="{{url('pengguna/edit/'.$key->id)}}"><button class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                          </td>
                          @endif
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="modal fade in" id="modal-addSupplier" style="padding-right: 15px;">
            
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