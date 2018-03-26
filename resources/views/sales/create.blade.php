@extends('layouts.default')
@section('title')
	Aggiungi
@endsection

@section('body')

<body>
  <head>
  <title>Dynamically add input field using jquery</title>
  <style>
  .container1 input[type=text] {
  padding:5px 0px;
  margin:5px 5px 5px 0px;
  }

  .container2 input[type=text] {
  padding:5px 0px;
  margin:5px 5px 5px 0px;
  }


  .add_form_product
  {
      background-color: #1c97f3;
      border: none;
      color: white;
      padding: 8px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
  	border:1px solid #186dad;

  }

  .add_form_treatment
  {
      background-color: #1c97f3;
      border: none;
      color: white;
      padding: 8px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
  	border:1px solid #186dad;

  }

  input{
      border: 1px solid #1c97f3;
      width: 260px;
      height: 40px;
  	margin-bottom:14px;
  }

  .delete{
      background-color: #fd1200;
      border: none;
      color: white;
      padding: 5px 15px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      margin: 4px 2px;
      cursor: pointer;

  }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script>
  $(document).ready(function() {
      var max_fields      = 50;
      var wrapper         = $(".container1");
      var wrapper2         = $(".container2");
      var add_product      = $(".add_form_product");
      var add_treatment      = $(".add_form_treatment");

      var x = 1;
      $(add_product).click(function(e){
          e.preventDefault();
          if(x < max_fields){
              x++;
              $(wrapper).append('<input type="text" name="products" placeholder="Prodotto"><input type="text" name="quantity" placeholder="quantità"><a href="#" class="delete">Delete</a></div>'); //add input box
          }
  		else
  		{
  		alert('You Reached the limits')
  		}
      });

      $(wrapper).on("click",".delete", function(e){
          e.preventDefault(); $(this).parent('div').remove(); x--;
      })

      //Treatment
      var y = 1;
      $(add_treatment).click(function(e){
          e.preventDefault();
          if(y < max_fields){
              y++;
              $(wrapper2).append('<div><input type="text" name="treatments" placeholder="Trattamento"><input type="text" name="quantity" placeholder="quantità"><a href="#" class="delete">Delete</a></div>'); //add input box
          }
      else
      {
      alert('You Reached the limits')
      }
      });

      $(wrapper2).on("click",".delete", function(e){
          e.preventDefault(); $(this).parent('div').remove(); y--;
      })
  });


  submitForms = function(){
    document.forms["products"].submit();
    document.forms["treatments"].submit();

  }
  </script>
  </head>
<div class="row">
    <div class="col-md-11 col-sm-12 col-lg-12 col-md-offset-0">
		<div class="panel panel-primary">
			<div class="panel-heading">Vendita
			</div>
			<div class="panel-body">
        <div class="col-md-6">
				<form method="POST" action ="{{action('SalesController@storeProducts')}}" name="products" accept-charset="UTF-8">
					{!! csrf_field() !!}
					<div class="form-group">
            <div class="container1">
                <button class="add_form_product">Nuovo Prodotto &nbsp; <span style="font-size:16px; font-weight:bold;">+ </span></button>
                <div><input type="text" name="products" placeholder="Prodotto"><input type="text" name="quantity" placeholder="quantità"></div>
            </div>
					</div>
        </div>
      </form>
        <div class="col-md-6">
          <form method="POST" action ="{{action('SalesController@storeTreatments')}}" name="treatments" accept-charset="UTF-8">
          <div class="form-group">
            <div class="container2">
              <button class="add_form_treatment">Nuovo Trattamento &nbsp; <span style="font-size:16px; font-weight:bold;">+ </span></button>
              <div><input type="text" name="products" placeholder="Prodotto"><input type="text" name="quantity" placeholder="quantità"></div>
          </div>
        </div>
      </form>
      </div>


					<button id="submit" type="submit" value="submit" class="btn btn-primary center" onclick="submitForms()">Aggiungi</button>

				</form>

			</div>
		</div>
	</div>
</div>
</body>
@endsection
