@extends('layouts.default')
@section('title')
	Aggiungi
@endsection

@section('body')

<datalist id="products">
@foreach ($products as $product)
	<option value= '{{$product->name}}'/>
@endforeach;
</datalist>

<datalist id="treatments">
@foreach ($treatments as $treatment)
	<option value= '{{ $treatment->name }}'/>
@endforeach;
</datalist>


<body>
  <head>
  <title>Nuova vendita</title>
  </head>

<div class="row">
    <div class="col-md-11 col-sm-12 col-lg-12 col-md-offset-0">
		<div class="panel panel-primary">
			<div class="panel-heading">Vendita
			</div>
			<div class="panel-body">
        <div class="col-md-6">
				<form method="POST" action ="/sales" class="containerP">
					{!! csrf_field() !!}
					<div class="form-group">
                <button class="addProductForm">Nuovo Prodotto + </span></button>
                <div><input list="products" type="text" name="products[]" placeholder="prodotto">
                  <input type="text" name="pQuantity[]" placeholder="quantità"></div>
            </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <div class="containerT">
              <button class="addTreatmentForm">Nuovo Trattamento + </span></button>
              <div><input list="treatments" type="text" name="treatments[]" placeholder="trattamento">
                <input type="text" name="tQuantity[]" placeholder="quantità"></div>
          </div>
        </div>
          <button type="submit" value="submit" class="btn btn-primary center">Aggiungi</button>
      </form>
      </div>
			</div>
		</div>
	</div>
</div>
    <script src="/vendor/jquery/jquery.js"></script>
    <script src="/js/script.js"></script>
</body>
@endsection
