@extends('layouts.default')
@section('title')
	Aggiungi
@endsection
@section('body')
	<div id="app">
		<sales  :products="{{ json_encode($products) }}"
		:treatments="{{ json_encode($treatments) }}"
		:users="{{ json_encode($users) }}">
		</sales>
	</div>
<script src="{{ asset('js/app.js') }} "></script>
@endsection