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
                  <h2 style="font-size: 25px" class="box-title">Data Siswa</h2></center>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <button style="margin-bottom: 10px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-addSiswa"><i class="fa fa-plus-square"></i>&nbsp;Tambah Siswa</button>
                  <div class="table-responsive">
                    <table id="example" class="table table-bordered table-hover" role="grid" aria-describedby="example1_info" data>
                      <thead>
                        <tr>
                          <th style="text-align: center;">No. </th>
                          <th style="text-align: center;">Nama Siswa</th>
                          <th style="text-align: center;">Kelas</th>
                          <th style="text-align: center;">Nisn</th>
                          <th style="text-align: center;">Telepon</th>
                          <th style="text-align: center;">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($siswas as $key)
                        <tr>
                          <td style="text-align: center;">{{$key->id}}</td>
                          <td style="text-align: center;">{{$key->namalengkap}}</td>
                          <td style="text-align: center;">{{$key->id_kelas}}</td>
                          <td style="text-align: center;">{{$key->nisn}}</td>
                          <td style="text-align: center;">{{$key->phone}}</td>
                          <td style="text-align: center;">
                            <a href="{{url('siswa/edit/'.$key->id)}}"><button class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                            <a href="{{url('siswa/delete/'.$key->id)}}" onclick="return confirm('are u sure to delete {{ $key->namalengkap }} ?')"><button class="btn btn-danger"><i class="fa fa-trash-o"></i></button></a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="modal fade in" id="modal-addSiswa" style="padding-right: 15px;">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span></button>
                          <center><h4 class="modal-title">Tambah Siswa</h4></center>
                        </div>
                        <div class="modal-body">
                          <form method="POST" action="{{url('siswa/save')}}">
                            <div class="form-group">
                              <label>Nama Siswa</label>
                              <input type="text" class="form-control" name="namasiswa" placeholder="Nama Siswa" required>
                            </div>
                            <div class="form-group">
                              <label>Kelas</label>
                              <select name="kelas" class="form-control select2">
                              <option value="">Pilih Kelas</option>
                              @foreach($kelas as $kelass)
                                <option value="{{ $kelass->id }}"> {{ $kelass->kelas }}
                                </option>
                              @endforeach
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Nisn</label>
                              <input type="number" class="form-control" name="nisn" placeholder="Nisn" required >
                            </div>
                            <div class="form-group">
                              <label>Phone</label>
                              <input type="number" class="form-control" name="phone" placeholder="Phone" required>
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