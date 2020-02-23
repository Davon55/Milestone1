@extends('layouts.appmaster')
@section('title', 'Login Passed Page')

@section('content')
	@if($model->getUsername())
	<h3>You have logged in successfully</h3>
	@else
	<h3>Someone besides Donnell logged in successfully</h3>
	@endif
	<a href="">Store</a> 
@endsection


