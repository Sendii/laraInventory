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
					<h4>Ubah User.</h4></center>
					<br>
					<div class="box-body">

						<form method="POST" action=" {{url('siswa/update')}} ">
							{{ csrf_field() }}
							<input type="hidden" name="id" value="{{$edits->id}}">
							<div class="form-group">
								<label class="col-sm-1 control-label">Nama</label>
								<div class="col-sm-4">
									<div class="input-group text">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input type="text" class="form-control" name="nama" value="{{$edits->nama}}" placeholder="Nama">
									</div>
								</div>
								<label class="col-sm-1 control-label">Kelas</label>
								<div class="col-sm-4">
									<div class="input-group text">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<select name="kelas" class="form-control select2">
											@foreach($kelass as $kelas)
											<option value="{{$kelas->id}}" {{$edits->id_kelas == $kelas->id ? 'selected' : ''}}> {{$kelas->kelas}}
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
										<input type="text" class="form-control" name="nis" value="{{$edits->nis}}" placeholder="NIS">
									</div>
								</div>
								<label class="col-sm-1 control-label">NISN</label>
								<div class="col-sm-4">
									<div class="input-group text">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input type="text" class="form-control" name="nisn" value="{{$edits->nisn}}" placeholder="NIS">
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
										<input type="text" class="form-control" name="alamat" value="{{$edits->alamat}}" placeholder="NIS">
									</div>
								</div>
								<label class="col-sm-1 control-label">No. Ijazah</label>
								<div class="col-sm-4">
									<div class="input-group text">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input type="text" class="form-control" name="nomorijazah" value="{{$edits->nomorijazah}}" placeholder="NIS">
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