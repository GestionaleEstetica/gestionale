@extends('layouts.default')
@section('title')
	Aggiungi
@endsection

@section('body')

<body>
<div class="row">
    <div class="col-md-6 col-sm-12 col-lg-6 col-md-offset-3">
		<div class="panel panel-primary">
			<div class="panel-heading">Dettagli prodotto
			</div>
			<div class="panel-body">
				<form method="POST" action ="/products/{{ $product->id }}/">
					{!! csrf_field() !!}
					{{ method_field('PUT') }}
					<div class="form-group">
						<label for="myName">Nome</label>
			        <input type='text' class="form-control" name='name' value="{{ $product->name }}">
					</div>
					<div class="form-group">
						<label for="lastname">Brand</label>
			        <input type='text' class="form-control" name='brand' value="{{ $product->brand }}">
					</div>
					<div class="form-group">
						<label for="age">Quantità</label>
			        <input type='number' class="form-control" name='quantity' value="{{ $product->quantity }}">
					</div>
					<div class="form-group">
						<label for="phone">Prezzo</label>
			        <input type='number' class="form-control" name='price' step="0.01" value="{{ $product->price }}">
					</div>
					
					<button id="submit" type="submit" value="submit" class="btn btn-primary center">Aggiungi</button>
			
				</form>

			</div>
		</div>
	</div>
</div>
</body>
@endsection
{{--
@extends('layouts.default')
@section('title')
	Aggiungi utente
@endsection

@section('body')
<div class="row">
	<form method="POST" action ="/products/{{ $product->id }}/">
		{!! csrf_field() !!}
		{{ method_field('PUT') }}
		<div class="col-lg-3 col-md-offset-4">
			<div class="well well-lg">
			    <div class="form-group">
			        <label>Nome</label>
			        <input type='text' class="form-control" name='name' value="{{ $product->name }}">
			    </div>
			    <div class="form-group">
			        <label>Marca</label>
			        <input type='text' class="form-control" name='brand' value="{{ $product->brand }}">
			    </div>
			    <div class="form-group">
			        <label>Quantità</label>
			        <input type='number' class="form-control" name='quantity' value="{{ $product->quantity }}">
			    </div>
			    <div class="form-group">
			        <label>Prezzo</label>
			        <input type='number' class="form-control" name='price' value="{{ $product->price }}">
			    </div>
				<p class="help-block">* Ogni campo è obbligatorio.</p>
				<input type='submit' class="btn btn-outline btn-success" name='Create'>
		</form>
				</div>
		</div>
	</div>
@endsection

--}}