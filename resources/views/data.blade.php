@extends('inti')
@section('judul','Daftar Nama')
@section('atribut')<h1>Data Member</h1><br/><a href="/data/logout">Logout</a><br/>@endsection
@section('cl','box')
@section('isi')
	@if ($message = Session::get('sukses'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button> 
			<strong>{{ $message }}</strong>
		</div>
	@endif
	@if ($message = Session::get('delete'))
		<div class="alert alert-danger alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button> 
			<strong>{{ $message }}</strong>
		</div>
	@endif
	@if ($message = Session::get('update'))
		<div class="alert alert-warning alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button> 
			<strong>{{ $message }}</strong>
		</div>
	@endif
	<a href="/data/tambah">+ Tambah Member Baru</a><br/><br/>
	<table border="1">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Date Of Birth</th>
			<th>No Telp</th>
			<th>Gender</th>
			<th>Nama File</th>
			<th>Options</th>
		</tr>
		@foreach($data as $d => $e)
		<tr>
			<td>{{ $d +1 }}</td>
			<td>{{ $e->nama }}</td>
			<td>{{ $e->email }}</td>
			<td>{{ $e->dateofbirth }}</td>
			<td>{{ $e->notelp }}</td>
			<td>{{ $e->gen }}</td>
			<td>{{ $e->namefile }}</td>
			<td>
				<a href="/data/edit/{{ $e->uid }}">Update</a>
				<strong>|</strong>
				<a href="/data/hapus/{{ $e->uid }}">Delete</a>
			</td>
		</tr>
		@endforeach
	</table>
@endsection