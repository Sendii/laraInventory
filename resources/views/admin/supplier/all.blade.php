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
                  <h2 style="font-size: 25px" class="box-title">Data Supplier</h2></center>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  @if (Auth::user() && Auth::user()->akses == 'Admin')
                  <button style="margin-bottom: 10px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-addSupplier"><i class="fa fa-plus-square"></i>&nbsp;Tambah Supplier</button>
                  @endif
                  <div class="table-responsive">
                    <table id="example" class="table table-bordered table-hover" role="grid" aria-describedby="example1_info" data>
                      <thead>
                        <tr>
                          <th style="text-align: center;">No. </th>
                          <th style="text-align: center;">Nama Supplier</th>
                          <th style="text-align: center;">Alamat</th>
                          <th style="text-align: center;">Telepon</th>
                          @if (Auth::user() && Auth::user()->akses == 'Admin')
                          <th style="text-align: center;">Action</th>
                          @endif
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($suppliers as $key)
                        <tr>
                          <td style="text-align: center;">{{$key->id}}</td>
                          <td style="text-align: center;">{{$key->nm_supplier}}</td>
                          <td style="text-align: center;">{{$key->alamat}}</td>
                          <td style="text-align: center;">{{$key->telepon}}</td>
                          @if (Auth::user() && Auth::user()->akses == 'Admin')
                          <td style="text-align: center;">
                            <a href="{{url('supplier/edit/'.$key->id)}}"><button class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                            <a href="{{url('supplier/delete/'.$key->id)}}" onclick="return confirm('are u sure to delete ?')"><button class="btn btn-danger"><i class="fa fa-trash-o"></i></button></a>
                          </td>
                          @endif
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="modal fade in" id="modal-addSupplier" style="padding-right: 15px;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
            <center><h4 class="modal-title">Tambah Supplier</h4></center>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{url('supplier/save')}}">
              <div class="form-group">
                <label>Nama Supplier</label>
                <input type="text" class="form-control" name="namasupplier" placeholder="Nama Supplier" required>
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
              </div>
              <div class="form-group">
                <label>Telepon</label>
                <input type="number" class="form-control" name="telepon" placeholder="Telepon" required >
              </div>
              <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Kembali</button>
              <button type="submit" class="btn btn-success pull-right">Masukan Data</button>
            </div>
          </form>
        </div>
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