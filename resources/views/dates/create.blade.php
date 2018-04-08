@extends('layouts.default')
@section('title')
	Aggiungi Appuntamento
@endsection
@section('body')
	<div id="app">
		<dates  
			:clients="{{ json_encode($clients) }}"
			:treatments="{{ json_encode($treatments) }}"
			>
		</dates>
	</div>
<script src="{{ asset('js/app.js') }} "></script>
@endsection
