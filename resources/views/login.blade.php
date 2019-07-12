@extends('inti')
@section('judul','Login')
@section('atribut','')
@section('cl','log')
@section('isi')
	@if ($message = Session::get('delete'))
		<div class="alert alert-danger alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button> 
			<strong>{{ $message }}</strong>
		</div>
	@endif
	<form method="post" action="/data/auth">
		{{ csrf_field() }}
		<div class="form-group">
			<label>Enter Email</label>
			<input type="email" name="email" class="form-control" required="required"/>
		</div>
		<div class="form-group">
			<label>Enter Password</label>
			<input type="password" name="password" class="form-control" required="required"/>
		</div>
		<div class="form-group">
			<input type="submit" name="login" class="btn-primary" value="Login" />
		</div>
	</form>
@endsection