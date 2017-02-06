@extends('layout')

@section('pageTitle')
Welcome
@stop

@section('content')

@unless (empty($waterin))
	@foreach ($waterin as $waterin_l)
		<li>{{ $waterin_l }}</li>
		@endforeach
@endunless

@stop