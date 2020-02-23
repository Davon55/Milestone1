@extends('layouts.appmaster')
@section('title', 'Register Page')

@section('content')
	@if($model->getUsername())
	<h3>You have registered successfully</h3>
	@else
	<h3>Someone besides the user logged in successfully</h3>
	@endif
	<a href="login2">Login</a>
@endsection


