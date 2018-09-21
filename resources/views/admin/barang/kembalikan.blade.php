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
          <h4>Pengembalian Barang</h4></center>
          <br>
          <div class="box-body">

            <form method="POST" action=" {{url('barang/pengembalian/save')}} ">
              {{ csrf_field() }}
              <input type="hidden" name="id" value="{{$barang->id}}">
              <input type="hidden" name="id_barang" value="{{$barang->id_barang}}">
              <input type="hidden" name="nm_supplier" value="{{$a->id_supplier}}">
              <input type="hidden" name="banyak_brg" value="{{$a->banyak_brg}}">
              <input type="hidden" name="kode_barang" value="{{$a->kode_barang}}">
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Siswa</label>
                <div class="col-sm-3">
                  <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-user"></i>
                    </div>
                    <?php
                      $namapeminjam = \App\Siswa::where('id', $barang->id_siswa)->value('nama');
                    ?>
                    <input type="text" class="form-control" name="nama_peminjam" value="{{$namapeminjam}}" placeholder="Nama Peminjam" readonly>
                  </div>
                </div>
                <label class="col-sm-2 control-label">Nama Barang</label>
                <div class="col-sm-3">
                  <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-user"></i>
                    </div>
                    <input type="text" class="form-control" name="nama_barang" value="{{$barang->nama_barang}}" placeholder="Nama Barang" readonly>
                  </div>
                </div>
                <br>
                <br>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Jumlah Pinjaman</label>
                <div class="col-sm-3">
                  <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-envelope"></i>
                    </div>
                    <?php $a = \App\Income::where('id', $barang->id_barang)->value('qty'); ?>
                    <input type="hidden" class="form-control" name="stock" value="{{ $a }}" placeholder="Jumlah" readonly>
                    <input type="hidden" class="form-control" name="stocker" value="{{$barang->jumlahminjam}}" placeholder="Jumlah">
                    <input type="number" class="form-control" name="jumlah" value="{{$barang->jumlahminjam}}" placeholder="Jumlah"  min="{{$barang->jumlahminjam}}" max="{{$barang->jumlahminjam}}">
                  </div>
                  <br>
                </div>
                <label class="col-sm-2 control-label">Keterangan Barang</label>
                <div class="col-sm-3">
                  <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-user"></i>
                    </div>
                    <select name="keterangan" class="form-control select2">
                      <option value="Bagus">Bagus</option>
                      <option value="Rusak">Rusak</option>
                      <option value="Hilang">Hilang</option>
                    </select>
                  </div>
                </div>
                <br>
                <br>
              </div>
              <!-- <div class="form-group">
                <label class="col-sm-2 control-label">Jumlah Rusak</label>
                <div class="col-sm-3">
                  <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-envelope"></i>
                    </div>
                    <?php $a = \App\Income::where('id', $barang->id_barang)->value('qty'); ?>
                    <input type="number" class="form-control" name="barangrusak" placeholder="Jumlah Barang Rusak">
                  </div>
                  <br>
                </div>
                <br>
                <br>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Jumlah Hilang</label>
                <div class="col-sm-3">
                  <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-envelope"></i>
                    </div>
                    <?php $a = \App\Income::where('id', $barang->id_barang)->value('qty'); ?>
                    <input type="number" class="form-control" name="baranghilang" value="" placeholder="Jumlah Barang Hilang">
                  </div>
                  <br>
                </div>
                <br>
                <br>
              </div> -->
              <div>
                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus-square">&nbsp;  Kembalikan</i></button>
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