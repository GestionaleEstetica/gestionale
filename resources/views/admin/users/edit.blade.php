@extends('layouts.default')
@section('title')
	Modifica
@endsection

@section('body')

<body>
<div class="row">
    <div class="col-md-6 col-sm-12 col-lg-6 col-md-offset-3">
		<div class="panel panel-primary">
			<div class="panel-heading">Dettagli utente
			</div>
			<div class="panel-body">
				<form method="POST" action ="/users/{{ $user->id }}">
					{!! csrf_field() !!}
					{{ method_field('PUT') }}
					<div class="form-group">
						<label>Nome</label>
			        <input type='text' class="form-control" name='first_name' value="{{ $user->first_name }}">
					</div>
					<div class="form-group">
						<label>Cognome</label>
			        <input type='text' class="form-control" name='last_name' value="{{ $user->last_name }}">
					</div>
					<div class="form-group">
						<label>Phone</label>
			        <input type='text' class="form-control" name='phone' value="{{ $user->phone }}">
					</div>
					<input type="button" onclick="history.back();" value="Indietro" class="btn btn-success center" />
					
					<button id="submit" type="submit" value="submit" class="btn btn-primary center">Modifica</button>

				</form>

			</div>
		</div>
	</div>
</div>
</body>
@endsection
