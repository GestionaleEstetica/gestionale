@extends('layouts.default')
@section('title')
	Mostra tutti
@endsection
@section('body')
	<div class="col-lg-2 col-md-offset-4">
		<!-- include('alert') -->
		<form method="GET" action ="/products/search">
			<div class="form-group input-group">
				<input type="search" name="value" class="form-control" placeholder="Cerca..">
				<span class="input-group-btn">
				    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
				</span>
			</div>
		</form>
	</div>
	<div class="col-lg-4 col-md-offset-3">
	<div class="panel panel-primary">
	   <div class="panel-heading">
			<i class="fa fa-shopping-cart"> TITOLO MUST BE INSERTED</i>
	   </div>
    <table class="table table-hover">
        <tr>
          <th>Codice</th>
          <th>Nome</th>
          <th>Marca</th>
          <th>Quantità</th>
          <th>Prezzo</th>
        </tr>
      <tbody>
       @forelse($products as $product)
        <tr>
          <td>{{ $product->id }}</td>
          <td>{{ $product->name }}</td>
          <td>{{ $product->brand }}</td>
          <td>{{ $product->quantity }}</td>
          <td>{{ $product->price }}</td>
        </tr>
        @empty<center><strong> Nessun prodotto registrato</strong></center>

        @endforelse  
      </tbody>
    </table>  
<div>{{ $products->links() }}</div>
   
{{--  
	   <div class="panel-footer text-center">
		  <a href="/products/{{ $product->id }}/edit" class="btn btn-outline btn-warning">Modifica</a>
		  <form action="/jobs/create" method="GET" style="display: inline;" >
		  	<input type="hidden" name="product_id" value="{{ $product->id }}" />
		  </form>
		  <form action="/products/{{ $product->id }}" method="POST" style="display: inline;">
		  	{{ csrf_field() }}
		  	{{ method_field('DELETE') }}
		  	<button class="btn btn-outline btn-danger">Elimina</button>
		  </form>
	   </div>
	</div>
	
--}}
@endsection