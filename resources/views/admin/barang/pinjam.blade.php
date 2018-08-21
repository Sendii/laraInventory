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
          <h4>Peminjaman Barang.</h4></center>
          <br>
          <div class="box-body">

            <form method="POST" action=" {{url('barang/peminjaman/save')}} ">
              {{ csrf_field() }}
              <input type="hidden" name="id" value="{{$barang->id}}">
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Barang</label>
                <div class="col-sm-3">
                  <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-user"></i>
                    </div>
                    <input type="text" class="form-control" name="nama_barang" value="{{$barang->nama_barang}}" placeholder="Nama Barang" readonly>
                  </div>
                </div>
                <label class="col-sm-2 control-label">Stock Barang</label>
                <div class="col-sm-3">
                  <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-user"></i>
                    </div>
                    <input type="text" class="form-control" name="stock" value="{{$barang->qty}}" placeholder="Nama Barang" readonly>
                  </div>
                </div>
                <br>
                <br>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Jumlah yg ingin dipinjam</label>
                <div class="col-sm-3">
                  <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-envelope"></i>
                    </div>
                    <input type="number" class="form-control" name="jumlah" value="" placeholder="Jumlah" max="{{$barang->qty - 1}}">
                  </div>
                  <br>
                </div>
                <label class="col-sm-2 control-label">Keterangan Barang</label>
                <div class="col-sm-3">
                  <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-user"></i>
                    </div>
                    <input type="text" class="form-control" name="keterangan" value="{{$barang->status}}" placeholder="Keterangan Barang" readonly>
                  </div>
                </div>
                <br>
                <br>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Peminjam</label>
                <div class="col-sm-9">
                  <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-book"></i>
                    </div>
                    <select name="namapeminjam" class="form-control select2" required>
                    	@foreach($siswas as $siswa)
                    	<option value="">Pilih Peminjam</option>
                    	<option value="{{ $siswa->id }}">{{ $siswa->namalengkap }}</option>
                    	@endforeach
                    </select>
                  </div>
                </div>
                <br>
                <br>
              </div>
              <div>
                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus-square">&nbsp;  Pinjam</i></button>
              </div>
          </form>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="{{asset('js/select2.full.min.js')}}"></script>
<script type="text/javascript">
  $('.select2').select2();
</script>