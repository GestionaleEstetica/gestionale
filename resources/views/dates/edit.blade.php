@extends('layouts.default')
@section('title')
	Modifica Appuntamento
@endsection

@section('body')
	<div id="app">
	    <edit-date
	      :appointment="{{ json_encode($date) }}"
	      :sales="{{ json_encode($date->treatments)}}"
	      :client="{{ json_encode($client)}}"
	      :clients="{{ json_encode($clients)}}"
	      :treatments="{{ json_encode($treatments) }}"
	      >
	    </edit-date>
	</div>
	<script src="{{ asset('js/app.js') }} "></script>
@endsection
