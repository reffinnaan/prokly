@extends('inti')
@section('judul','Form Tambah Member')
@section('atribut')<h1>Data Member</h1><br/><a href="/data/logout">Logout</a><br/>@endsection
@section('cl','box')
@section('isi')
	<a href="/data/data"><< Kembali</a><br/><br/>
	<form action="/data/stored" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		<table>
			<tr><td>Nama</td><td> : </td><td><input type="text" name="nama" required="required"></td></tr>
			<tr><td>Password</td><td> : </td><td><input type="password" name="password" required="required"></td></tr>
			<tr><td>Email</td><td> : </td><td><input type="text" name="email" required="required"></td></tr>
			<tr><td>Date Of Birth</td><td> : </td><td><input type="date" name="dateofbirth" required="required"></td></tr>
			<tr><td>No Telp</td><td> : </td><td><input type="text" name="notelp" required="required"></td></tr>
			<tr><td>Gender</td><td> : </td><td><select name="gender" required="required"><option value="" selected>Pilih</option><option value="P">P</option><option value="W">W</option></select></td></tr>
			<tr><td>Gambar</td><td> : </td><td><input type="file" name="file"></td></tr>
			<tr><td><input type="submit" value="Simpan Data"></td><td></td><td><button type="reset">Reset</button></td></tr>
		</table>
	</form>
@endsection