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
								<label class="col-sm-2 control-label">Nama</label>
								<div class="col-sm-9">
									<div class="input-group text">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input type="text" class="form-control" name="nama" value="{{$edits->namalengkap}}" placeholder="Nama">
									</div>
								</div>
								<br>
								<br>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Kelas: </label>
								<div class="col-sm-9">
									<div class="input-group text">
										<div class="input-group-addon">
											<i class="fa fa-black-tie"></i>
										</div>
										<select name="kelas" class="form-control select2">
											@foreach($kelass as $kelas)
											<option value="{{$kelas->id}}"> {{$kelas->kelas}}
											</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Phone</label>
								<div class="col-sm-9">
									<div class="input-group text">
										<div class="input-group-addon">
											<i class="fa fa-phone"></i>
										</div>
										<input type="number" class="form-control" name="phone" value="{{$edits->phone}}" placeholder="Phone">
									</div>
									<br>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Nisn</label>
								<div class="col-sm-9">
									<div class="input-group text">
										<div class="input-group-addon">
											<i class="fa fa-book"></i>
										</div>
										<input type="number" class="form-control" name="nisn" value="{{$edits->nisn}}" placeholder="Nisn">
									</div>
									<br>
								</div>
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