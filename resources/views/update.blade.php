@extends('inti')
@section('judul','Form Edit Member')
@section('atribut')<h1>Data Member</h1><br/><a href="/data/logout">Logout</a><br/>@endsection
@section('cl','box')
@section('isi')
	<a href="/data/data"><< Kembali</a><br/><br/>
	@foreach($data as $y)
	@php
	$slc='';
    $sld='';
    $df='selected';
	if($y->gen=='P'){
		$slc='selected';
		$sld='';
		$df='';
	}else if($y->gen=='W'){
		$sld='selected';
		$slc='';
		$df='';
	}
	@endphp
	<form action="/data/updated" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		<table>
			<tr><td><input type="hidden" name="id" value="{{ $y->uid}}"></td><td><input type="hidden" name="namefile" value="{{ $y->namefile }}"></td><td><input type="hidden" name="img" value="{{ $y->foto}}"></td></tr>
			<tr><td>Nama</td><td> : </td><td><input type="text" name="nama" value="{{ $y->nama }}" required="required"></td></tr>
			<tr><td>Password</td><td> : </td><td><input type="password" value="{{ $y->pswrd }}" name="password" required="required"></td></tr>
			<tr><td>Email</td><td> : </td><td><input type="text" name="email" value="{{ $y->email }}" required="required"></td></tr>
			<tr><td>Date Of Birth</td><td> : </td><td><input type="date" value="{{ $y->dateofbirth }}" name="dateofbirth" required="required"></td></tr>
			<tr><td>No Telp</td><td> : </td><td><input type="text" name="notelp" value="{{ $y->notelp}}" required="required"></td></tr>
			<!--<tr><td>Gender</td><td> : </td><td><select name="gender" required="required"><option value="" .{{ $df }}.>Pilih</option><option value="P" .{{ $slc }}.>P</option><option value="W" .{{ $sld }}.">W</option></select></td></tr>-->
			<tr><td>Gender</td><td> : </td><td><select name="gender" required="required"><option value="" {{ $df }}>Pilih</option><option value="P" {{ $slc }}>P</option><option value="W" {{ $sld }}>W</option></select></td></tr>
			<tr><td>Gambar</td><td> : </td><td><input type="file" name="file"></td></tr>
			<tr><td><input type="submit" value="Simpan Data"></td></tr>
		</table>
	</form>
	@endforeach
@endsection