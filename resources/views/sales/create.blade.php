@extends('layouts.default')
@section('title')
	Aggiungi
@endsection

@section('body')

<datalist id="products">
@foreach ($products as $product)
 PRODOTTO '<option value= {{$product->name}} />'
@endforeach;
</datalist>

<datalist id="treatments">
@foreach ($treatments as $treatment)
 TRATTAMENTO '<option value= {{ $treatment->name }} />'
@endforeach;
</datalist>


<body>
  <head>
  <title>Vendita Prodotti</title>
	<link rel="stylesheet" type="text/css" href="/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="/js/script.js"></script>
  </head>

<div class="row">
    <div class="col-md-11 col-sm-12 col-lg-12 col-md-offset-0">
		<div class="panel panel-primary">
			<div class="panel-heading">Vendita
			</div>
			<div class="panel-body">
        <div class="col-md-6">
				<form method="POST" action ="/sales">
					{!! csrf_field() !!}
					<div class="form-group">
            <div class="containerP">
                <button class="addProductForm">Nuovo Prodotto + </span></button>
                <div><input list="products" type="text" name="product[]" placeholder="Prodotto">
                  <input type="text" name="quantity[]" placeholder="quantità"></div>
            </div>
					</div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <div class="containerT">
              <button class="addTreatmentForm">Nuovo Trattamento + </span></button>
              <div><input list="treatments" type="text" name="treatment[]" placeholder="Prodotto">
                <input type="text" name="quantity[]" placeholder="quantità"></div>
          </div>
        </div>
          <button type="submit" value="submit" class="btn btn-primary center">Aggiungi</button>
      </form>
      </div>
			</div>
		</div>
	</div>
</div>
</body>
@endsection
