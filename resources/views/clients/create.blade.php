@extends('layouts.default')
@section('title')
	Aggiungi
@endsection

@section('body')

<body>
<div class="row">
    <div class="col-md-6 col-sm-12 col-lg-6 col-md-offset-3">
		<div class="panel panel-primary">
			<div class="panel-heading">Dettagli utente
			</div>
			<div class="panel-body">
				<form method="POST" action ="/clients">
					{!! csrf_field() !!}
					<div class="form-group">
						<label>Nome</label>
			        <input type='text' class="form-control" name='first_name' placeholder="Es: Mario" required>
					</div>
					<div class="form-group">
						<label>Cognome</label>
			        <input type='text' class="form-control" name='last_name' placeholder="Es: Rossi" required>
					</div>
					<div class="form-group">
						<label>Data di nascita</label>
							<input type='date' class="form-control" name='birthday' placeholder="01/01/1900" required>
					</div>
					<div class="form-group">
						<label>Phone</label>
			        <input type='text' class="form-control" name='phone' placeholder="Es: +39 380 209 1223" required>
					</div>
					<div class="form-group">
						<label>Email</label>
			        <input type='email' class="form-control" name='email' placeholder="Es: ciao@gmail.com" >
			    	</div>
					<div class="form-group">
						<label>Promozioni ( opzionale )</label>
				       <textarea class="form-control" rows="5" name="promozioni" placeholder="3 cerette total body, 2 pedicure"></textarea>
				   	</div>
					<button id="submit" type="submit" value="submit" class="btn btn-primary center">Aggiungi</button>

				</form>

			</div>
		</div>
	</div>
</div>
</body>
@endsection
