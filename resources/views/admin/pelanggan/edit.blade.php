<link rel="stylesheet" href="{{asset('css/select2.min.css')}}"> @include('layouts.sidebar')
<div class="content-wrapper">
  <div class="container-fluid spark-screen">
    <br>
    <div class="col-md-10 col-md-offset-1">
      <!-- Horizontal Form -->
      <div class="box box-info">
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <div class="btn-group">
          </div>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
        <br>
        <center>
          <h4>Ubah Pelanggan.</h4></center>
          <br>
          <div class="box-body">

            <form method="POST" action=" {{url('pelanggan/update')}} ">
              {{ csrf_field() }}
              <input type="hidden" name="id" value="{{$pelanggans->id}}">
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Outlet</label>
                <div class="col-sm-9">
                  <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-user"></i>
                    </div>
                    <input type="text" class="form-control" name="nama" value="{{$pelanggans->nama_outlet}}" placeholder="Nama" readonly>
                  </div>
                </div>
                <br>
                <br>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">E-Mail</label>
                <div class="col-sm-9">
                  <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-envelope"></i>
                    </div>
                    <input type="text" class="form-control" name="email" value="{{$pelanggans->email}}" placeholder="E-Mail" readonly>
                  </div>
                  <br>
                </div>
                <br>
                <br>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-9">
                  <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-book"></i>
                    </div>
                    <input type="text" class="form-control" name="alamat" value="{{$pelanggans->alamat}}" placeholder="Alamat">
                  </div>
                </div>
                <br>
                <br>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Telepon</label>
                <div class="col-sm-9">
                  <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-phone"></i>
                    </div>
                    <input type="text" class="form-control" name="telepon" value="{{$pelanggans->telepon}}" placeholder="Telepon">
                  </div>
                </div>
                <br>
                <br>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">NPWP</label>
                <div class="col-sm-9">
                  <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-number"></i>
                    </div>
                    <input type="text" class="form-control" name="npwp" value="{{$pelanggans->npwp}}" placeholder="NPWP">
                  </div>
                </div>
                <br>
                <br>
              </div>
              <div>
                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-users">&nbsp;  Submit</i></button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="{{asset('js/select2.full.min.js')}}"></script>
<script type="text/javascript">
  $('.select2').select2();
</script>