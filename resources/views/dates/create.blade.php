@extends('layouts.default')
@section('title')
	Aggiungi Appuntamento
@endsection
@section('body')
	<div id="app">
		<dates  
			:clients="{{ $clients }}"
			:treatments="{{ json_encode($treatments) }}"
			:user="{{ $user }}"
			data="{{ $data }}"
			orario="{{ $orario }}"
			>
		</dates>
	</div>
<script src="{{ asset('js/app.js') }} "></script>
@endsection
