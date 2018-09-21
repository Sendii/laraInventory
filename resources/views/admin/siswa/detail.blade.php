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
					<h4>Ubah Siswa</h4></center>
					<br>
					<div class="box-body">

						<form method="POST" action=" {{url('siswa/update')}} ">
							{{ csrf_field() }}
							<input type="hidden" name="id" value="{{$siswas->id}}">
							<div class="form-group">
								<label class="col-sm-1 control-label">Nama</label>
								<div class="col-sm-4">
									<div class="input-group text">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input type="text" class="form-control" readonly name="nama" value="{{$siswas->nama}}" placeholder="Nama">
									</div>
								</div>
								<label class="col-sm-1 control-label">Kelas</label>
								<div class="col-sm-4">
									<div class="input-group text">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<select readonly name="kelas" class="form-control select2">
											@foreach($kelas as $kelas)
											<option value="{{$kelas->id}}" disabled {{$siswas->id_kelas == $kelas->id ? 'selected' : ''}}> {{$kelas->kelas}}
											</option>
											@endforeach
										</select>
									</div>
								</div>
								<br>
								<br>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">NIS</label>
								<div class="col-sm-4">
									<div class="input-group text">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input type="text" class="form-control" readonly name="nis" value="{{$siswas->nis}}" placeholder="NIS">
									</div>
								</div>
								<label class="col-sm-1 control-label">NISN</label>
								<div class="col-sm-4">
									<div class="input-group text">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input type="text" class="form-control" readonly name="nisn" value="{{$siswas->nisn}}" placeholder="NIS">
									</div>
								</div>
								<br>
								<br>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">No. Hp</label>
								<div class="col-sm-4">
									<div class="input-group text">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input type="text" class="form-control" readonly name="nohp" value="{{$siswas->nohp}}" placeholder="No. Hp">
									</div>
								</div>
								<label class="col-sm-1 control-label">NIK</label>
								<div class="col-sm-4">
									<div class="input-group text">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input type="text" class="form-control" readonly name="nik" value="{{$siswas->nik}}" placeholder="NIK">
									</div>
								</div>
								<br>
								<br>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">Jenis Kelamin</label>
								<div class="col-sm-4">
									<div class="input-group text">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input type="text" class="form-control" readonly name="jenkel" value="{{$siswas->jenkel}}" placeholder="Jenis Kelamin">
									</div>
								</div>
								<label class="col-sm-1 control-label">Agama</label>
								<div class="col-sm-4">
									<div class="input-group text">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input type="text" class="form-control" readonly name="agama" value="{{$siswas->agama}}" placeholder="Agama">
									</div>
								</div>
								<br>
								<br>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">Tempat</label>
								<div class="col-sm-4">
									<div class="input-group text">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input type="text" class="form-control" readonly name="tempat" value="{{$siswas->tempat}}" placeholder="Tempat Lahir">
									</div>
								</div>
								<label class="col-sm-1 control-label">Tanggal Lahir</label>
								<div class="col-sm-4">
									<div class="input-group text">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input type="date" class="form-control" readonly name="tanggallahir" value="{{$siswas->tanggallahir}}" placeholder="Tanggal Lahir">
									</div>
								</div>
								<br>
								<br>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">Nama Ortu</label>
								<div class="col-sm-4">
									<div class="input-group text">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										@if(is_null($siswas->namaortu))
										<input type="text" class="form-control" readonly name="namaortu" value="{{$siswas->namaayah}}" placeholder="Nama Ortu">
										@else
										<input type="text" class="form-control" readonly name="namaortu" value="{{$siswas->namaortu}}" placeholder="Nama Ortu">
										@endif
									</div>
								</div>
								<label class="col-sm-1 control-label">Tahun Masuk</label>
								<div class="col-sm-4">
									<div class="input-group text">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input type="text" class="form-control" readonly name="tahun" value="{{$siswas->tahun}}" placeholder="Tahun">
									</div>
								</div>
								<br>
								<br>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">Alamat</label>
								<div class="col-sm-4">
									<div class="input-group text">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<textarea type="text" class="form-control" readonly name="alamat" placeholder="Alamat">{{$siswas->alamat}}"</textarea>
									</div>
								</div>
								<label class="col-sm-1 control-label">No. Ijazah</label>
								<div class="col-sm-4">
									<div class="input-group text">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										@if(is_null($siswas->nomorijazah))
										<input type="text" class="form-control" readonly name="nomorijazah" value="-" placeholder="No. Ijazah">
										@else
										<input type="text" class="form-control" readonly name="nomorijazah" value="{{$siswas->nomorijazah}}" placeholder="No. Ijazah">
										@endif
									</div>
								</div>
								<br>
								<br>
							</div>

							<div>
								<a href="{{url('siswa')}}" class="btn btn-primary pull-right"><i class="fa fa-hand-o-left">&nbsp;  Back</i></a>
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