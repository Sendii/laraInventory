<?php
	$semuabarang = \App\Income::count(); 
	$semuapeminjaman = \App\Peminjaman::count(); 
	$rusak = \App\Peminjaman::where('keterangan', 'Rusak')->count();
	$hilang = \App\Peminjaman::where('keterangan', 'Hilang')->count();
?>
@if($semuabarang <= 0)
<h3>Semua Barang: Tidak ada</h3>
@elseif($semuabarang > 0)
<h3>Semua Barang: {{ $semuabarang }}</h3>
@endif
@if($semuapeminjaman <= 0)
<h3>Barang Terpinjam: Tidak ada</h3>
@elseif($semuapeminjaman > 0)
<h3>Barang Terpinjam: {{ $semuapeminjaman }}</h3>
@endif

@if($rusak <= 0)
<h3>Barang Rusak: Tidak ada</h3>
@elseif($semuapeminjaman > 0)
<h3>Barang Rusak: {{$rusak}}</h3>
@endif

@if($hilang <= 0 )
<h4>Barang Hilang: Tidak ada</h4>
@elseif($hilang > 0)
<h3>Barang Hilang: {{$hilang}}</h3>
@endif