@extends('layouts.default')
@section('title')
	Aggiungi
@endsection

@section('body')

<body>
  <head>
  <title>Vendita Prodotti</title>
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" type="text/css" href="/css/awesomplete.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="/js/script.js"></script>
	<script src="/js/awesomplete.js"></script>
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
            <div class="container1">
                <button class="add_form_product">Nuovo Prodotto &nbsp; <span style="font-size:16px; font-weight:bold;">+ </span></button>
                <div><input data-list="CSS, JavaScript, HTML, SVG, ARIA, MathML" class="dropdown-input" type="text" name="product[]" placeholder="Prodotto">
                  <input type="text" name="quantity[]" placeholder="quantità"></div>
            </div>
					</div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <div class="container2">
              <button class="add_form_treatment">Nuovo Trattamento <span style="font-size:16px; font-weight:bold;">+ </span></button>
              <div><input id="treatmentId" type="text" name="treatment" placeholder="Prodotto">
                <input type="text" name="quantity" placeholder="quantità"></div>
          </div>
        </div>
          <button id="submit" type="submit" value="submit" class="btn btn-primary center">Aggiungi</button>
      </form>
      </div>
			</div>
		</div>
	</div>
</div>
</body>
@endsection
