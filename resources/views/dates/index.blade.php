@extends('layouts.default')
@section('title')
	Calendario Estetica Galante <span class="pull-right">{{$date}}</span>
@endsection
@section('body')
	<div id="app">
		<index-date
			:users="{{ json_encode($users) }}"
			:dates="{{ json_encode($dates) }}"
			:clients="{{ $clients }}"
			:date="{{ $date }}"
			>
		</index-date>
	</div>
<script src="{{ asset('js/app.js') }} "></script>
@endsection
