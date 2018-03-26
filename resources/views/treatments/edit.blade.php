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
				<form method="POST" action ="/treatments/{{ $treatment->id }}">
					{!! csrf_field() !!}
					{{ method_field('PUT') }}
					<div class="form-group">
						<label>Nome</label>
			        <input type='text' class="form-control" name='name' value="{{ $treatment->name }}">
					</div>
					<div class="form-group">
						<label>Durata Min</label>
			        <input type='text' class="form-control" name='duration' value="{{ $treatment->duration }}">
					</div>
					<div class="form-group">
						<label>Prezzo</label>
			        <input type='number' class="form-control" name='price' value="{{ $treatment->price }}">
					</div>

					<input type="hidden" name="">

					<button id="submit" type="submit" value="submit" class="btn btn-primary center">Aggiungi</button>

				</form>

			</div>
		</div>
	</div>
</div>
</body>
@endsection