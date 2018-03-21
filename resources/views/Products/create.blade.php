@extends('layouts.default')
@section('title')
	Aggiungi utente
@endsection

@section('body')
<div class="row">
	<form method="POST" action ="/products">
		{!! csrf_field() !!}
		<div class="col-lg-3 col-md-offset-4">
			<div class="well well-lg">
			    <div class="form-group">
			        <label>Nome</label>
			        <input type='text' class="form-control" name='name' placeholder="Es: Lucida labbra">
			    </div>
			    <div class="form-group">
			        <label>Marca</label>
			        <input type='text' class="form-control" name='brand' placeholder="Es: Sephora">
			    </div>
			    <div class="form-group">
			        <label>Quantità</label>
			        <input type='number' class="form-control" name='quantity' placeholder="Es: 12">
			    </div>
			    <div class="form-group">
			        <label>Prezzo</label>
			        <input type='number' class="form-control" name='price' placeholder="Es: 20,99" step="0.01">
			    </div>
				<input type="hidden" name="remember_token" value="{{ str_random(10) }}">
				<p class="help-block">* Ogni campo è obbligatorio.</p>
				<input type='submit' class="btn btn-outline btn-success" name='Create'>
		</form>
				</div>
		</div>
	</div>
@endsection