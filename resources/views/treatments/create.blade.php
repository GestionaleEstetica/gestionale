@extends('layouts.default')
@section('title')
	Aggiungi
@endsection

@section('body')

<body>
<div class="row">
    <div class="col-md-6 col-sm-12 col-lg-6 col-md-offset-3">
		<div class="panel panel-primary">
			<div class="panel-heading">Dettagli trattamenti
			</div>
			<div class="panel-body">
				<form method="POST" action ="/treatments">
					{!! csrf_field() !!}
					<div class="form-group">
						<label>Nome</label>
			        <input type='text' class="form-control" name='name' placeholder="Es: Ceretta Gambe">
					</div>
					<div class="form-group">
						<label>Durata (minuti)</label>
			        <input type='text' class="form-control" name='duration' placeholder="Es: Sephora">
					</div>
					<div class="form-group">
						<label>Prezzo</label>
			        <input type='number' class="form-control" name='price' placeholder="Es: 20,99" step="0.01">
					</div>

					<button id="submit" type="submit" value="submit" class="btn btn-primary center">Aggiungi</button>

				</form>

			</div>
		</div>
	</div>
</div>
</body>
@endsection
