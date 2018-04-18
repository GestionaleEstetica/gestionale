@extends('layouts.default')
@section('title')
	Aggiungi Utente
@endsection

@section('body')

<body>
<div class="row">
    <div class="col-md-6 col-sm-12 col-lg-6 col-md-offset-3">
		<div class="panel panel-primary">
			<div class="panel-heading">Dettagli utente
			</div>
			<div class="panel-body">
				<form method="POST" action ="/users">
					{!! csrf_field() !!}
					<div class="form-group">
						<label>Nome</label>
			        <input type='text' class="form-control" name='first_name' placeholder="Es: Alessia">
					</div>
					<div class="form-group">
						<label>Cognome</label>
			        <input type='text' class="form-control" name='last_name' placeholder="Es: Rossi">
					</div>
					<div class="form-group">
						<label>Phone</label>
			        <input type='text' class="form-control" name='phone' placeholder="Es: +39 380 209 1223">
					</div>
					<button id="submit" type="submit" value="submit" class="btn btn-primary center">Aggiungi</button>

				</form>

			</div>
		</div>
	</div>
</div>
</body>
@endsection
