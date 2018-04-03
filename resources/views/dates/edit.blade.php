@extends('layouts.default')
@section('title')
	Modifica Appuntamento
@endsection

@section('body')

<body>
<div class="row">
    <div class="col-md-6 col-sm-12 col-lg-6 col-md-offset-3">
		<div class="panel panel-primary">
			<div class="panel-heading">Modifica Appuntamento
			</div>
			<div class="panel-body">
				<form method="POST" action ="/dates/{{ $date->id }}">
					{!! csrf_field() !!}
					{{ method_field('PUT') }}
					<div class="form-group">
						<label>Cliente</label>
            <select name="client_id" class="form-control">
              @foreach ($clients as $client)
              @if( $client->id == $date->client_id){
                <option value="{{$client->id}}" selected> {{$client->first_name}} {{$client->last_name}} </option>
              }
              @else <option value="{{$client->id}}"> {{$client->first_name}} {{$client->last_name}} </option>
              @endif
              @endforeach
            </select>
					</div>
					<div class="form-group">
						<label>Data</label>
			        <input type='date' class="form-control" name='date' value="{{ $date->date }}">
					</div>
					<div class="form-group">
						<label>Orario</label>
			        <input type='time' class="form-control" name='time' value="{{ $date->time }}">
					</div>
					<div class="form-group">
						<label>Description</label>
			        <input type='text' class="form-control" name='description' value="{{ $date->description }}">
			    	</div>
					<input type="button" onclick="history.back();" value="Indietro" class="btn btn-success center" />
					<button id="submit" type="submit" value="submit" class="btn btn-primary center">Modifica</button>
					@if(!$date->done)<a href="{{ route('markAsDone', $date->id) }}" class="btn btn-xs btn-info pull-right">Concludi</a>
					@endif
					<form action="{{ route('dates.destroy', $date->id) }}" method="POST">
    				{{ csrf_field() }}
    				{{ method_field('DELETE') }}
    				<button class="btn btn-danger center" value="Cancella">Cancella</button>
					</form>
					</form>
			</div>
		</div>
	</div>
</div>
</body>
@endsection
