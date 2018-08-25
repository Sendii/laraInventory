<!DOCTYPE html>
<html>

<head>
</head>
<?php $_requestUrl = basename($_SERVER['REQUEST_URI']); ?>
<link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-datepicker.min.css')}}">
@extends('layouts.adminlte')
<body class="hold-transition skin-blue sidebar-mini">
    @include('layouts.sidebar')
    <div class="content-wrapper">
        <div class="container-fluid spark-screen">
            <div class="col-md-12 col-md-offset-1">
                <br>
                <div class="col-md-10">
                    <!-- Horizontal Form -->
                    <div class="box box-info">
                        @if($_requestUrl == "add")
                        <form method="POST" action="{{url('barang/save')}}">
                            @elseif($_requestUrl == "addtolak")
                            <form method="POST" action="{{url('barang/savetolak')}}">
                                @endif
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <div class="btn-group">
                                    </div>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                                @if($_requestUrl == "add")
                                <center><h2>Tambah Data Barang Diterima</h2> </center>
                                @elseif($_requestUrl == "addtolak")
                                <center><h2>Tambah Data Barang Ditolak</h2> </center>
                                @endif
                                <div class="box-header with-border">
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                {!! csrf_field() !!}
                                <div class="box-body">
                                    <div class="form-group pull-left">
                                        <label class="col-sm-1 control-label">Jumlah Barang</label>
                                        <div class="col-sm-3">
                                            <div class="input-group text">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-apple"></i>
                                                </div>
                                                <input type="number" name="row" class="form-control" placeholder="Masukan angka..." value="" required autofocus min="1" max="10">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label">Nama Supplier</label>
                                            <div class="col-sm-4">
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <select name="supplier" class="form-control select2">
                                                        @foreach($suppliers as $saa)
                                                        <option value="{{$saa->id}}"> {{$saa->nm_supplier}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-10 col-md-offset-1">
                                                <table class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Barang</th>
                                                            <th>Jumlah Barang</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function() {
                                            $('input[name="row"]').on('input', function() {
                                                var row = $('input[name="row"]').val();
                                                var tag = '';
                                                for (i = 1; i <= row; i++) {
                                                    tag += '<tr><td><input type="text" name="nama[]" required class="form-control" placeholder="Nama Barang" required></td><td><input type="number" required name="qty[]" placeholder="Jumlah Barang" class="form-control qty qty' + i + '" required></td></tr>';
                                                }
                                                $('tbody').html(tag);
                                                subtotal();
                                            });
                                        });
                                    </script>
                                    <div class="form-group pull-left">
                                        @if($_requestUrl == "addtolak")
                                        <label class="col-sm-1 control-label">Ket. Ditolak</label>
                                        <div class="col-sm-3">
                                            <div class="input-group text">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-apple"></i>
                                                </div>
                                                <input type="text" name="keterangan2" class="form-control" placeholder="Keterangan" required autofocus>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                        <div class="box-footer">
                                            <button type="submit" name="simpan" class="btn btn-primary pull-right"><i class="fa fa-plus-square">&nbsp;</i>Tambahkan</button>
                                        </div>
                                </div>
                            </form>
                            <!-- Control Sidebar -->
                        </div>
                        <script type="text/javascript" src="{{asset('js/forms.min.js')}}"></script>
                        <script type="text/javascript" src="{{asset('js/select2.full.min.js')}}"></script>
                        <script type="text/javascript" src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
                        <script type="text/javascript">
                            var nowDate = new Date();
                            var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);

                            $('.select2').select2();
                            $('#datepicker1').datepicker({
                                autoclose: true
                            });
                            $('#datepicker2').datepicker({
                                autoclose: true
                            });

                            $('#datepicker3').datepicker({
                                startDate: today,
                                useCurrent: false,
                                autoclose: true
                            });
                        </script>
                    </body>
                    </html>