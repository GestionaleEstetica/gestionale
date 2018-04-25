@extends('layouts.default')
@section('title')
	Aggiungi Appuntamento
@endsection
@section('body')
	<div id="app">
		<dates  
			:clients="{{ $clients }}"
			:treatments="{{ json_encode($treatments) }}"
			:user="{{ json_encode($user) }}"
			:orario="{{ $orario }}"
			:data="{{ $data }}"
			>
		</dates>
	</div>
<script src="{{ asset('js/app.js') }} "></script>
@endsection
