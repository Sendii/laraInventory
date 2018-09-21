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
                  <a class="navbar-brand" href="#">Import - Export Excel </a>
                </div>
                <!-- /.box-header -->
                <div class="table-responsive">
                  <div class="box-body">
                    <div class="container">
                      <a href="{{ URL::to('downloadExcel/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
                      <a href="{{ URL::to('downloadExcel/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>


                      <a href="{{ URL::to('downloadExcel/csv') }}"><button class="btn btn-success">Download CSV</button></a>
                      <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('siswa/importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="import_file"> <br>
                        <button class="btn btn-primary">Import File</button>
                      </form>
                    </div>
                  </div>
                </div>
              </body>
              </html>