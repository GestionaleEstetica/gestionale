@extends('layouts.default')
@section('title')
	Aggiungi Appuntamento
@endsection

@section('body')

<body>
<div class="row">
    <div class="col-md-6 col-sm-12 col-lg-6 col-md-offset-3">
		<div class="panel panel-primary">
			<div class="panel-heading">Appuntamento
			</div>
			<div class="panel-body">
				<form method="POST" action ="/dates" >
					{!! csrf_field() !!}
					<div class="form-group">
						<label>Cliente</label>
			        <select name="client_id" class="form-control">
								@foreach ($clients as $client)
								<option value="{{$client->id}}"> {{$client->first_name}} {{$client->last_name}} </option>
								@endforeach
							</select>
					</div>
					<div class="form-group">
						<label>Data</label>
			        <input type='date' class="form-control" name='date'>
					</div>
					<div class="form-group">
						<label>Ora</label>
			        <input type='time' class="form-control" name='time'>
					</div>
					<div class="form-group">
						<label>Trattamento</label>
			        <input type='text' class="form-control" name='treatments[]'>
			    	</div>
          <div class="form-group">
            <label>Descrizione</label>
              <input type='text' class="form-control" name='description'>
          </div>
					<button id="submit" type="submit" value="submit" class="btn btn-primary center">Aggiungi</button>

				</form>

			</div>
		</div>
	</div>
</div>
</body>
@endsection
