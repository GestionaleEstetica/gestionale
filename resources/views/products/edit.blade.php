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