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
				<form method="POST" action ="/products">
					{!! csrf_field() !!}
					<div class="form-group">
						<label>Nome</label>
			        <input type='text' class="form-control" name='name' placeholder="Es: Smalto">
					</div>
					<div class="form-group">
						<label>Brand</label>
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
					
					<button id="submit" type="submit" value="submit" class="btn btn-primary center">Aggiungi</button>
			
				</form>

			</div>
		</div>
	</div>
</div>
</body>
@endsection