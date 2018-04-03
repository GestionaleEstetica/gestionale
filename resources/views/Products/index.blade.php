@extends('layouts.default')
@section('title')
	Mostra tutti
@endsection
@section('body')
	<div class="col-lg-4">
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
	<div class="row">
<div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h2 style="margin:0px; text-align:center; font-weight:bold">Prodotti</h2>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
								          <th>Codice</th>
								          <th>Nome</th>
								          <th>Marca</th>
								          <th>Quantità</th>
								          <th>Prezzo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
					       @forelse($products as $product)
					        <tr>
					          <td>{{ $product->id }}</td>
					          <td>{{ $product->name }}</td>
					          <td>{{ $product->brand }}</td>
					          <td>{{ $product->quantity }}</td>
					          <td>{{ $product->price }}</td>

							<td class="text-center">
					          	<form action="/products/{{ $product->id }}/edit" method="GET">
							  <button type="submit" class="btn btn-warning btn-sm">
					          <div class="glyphicon glyphicon-pencil"></div>
							</button>

							  </form>
							</td>

					          <td class="text-center">
					          	<form action="/products/{{ $product->id }}" method="POST" style="display: inline;">
							  	{{ csrf_field() }}
							  	{{ method_field('DELETE') }}

							  <button type="submit" class="btn btn-danger btn-sm">
					          <div class="glyphicon glyphicon-remove"></div>
								</button>

							  </form>
							</td>

					        </tr>
					        @empty<center><strong> Nessun prodotto registrato</strong></center>

					        @endforelse
      					</tbody>
                                </table>
                            <div>{{ $products->links() }}</div>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>

@endsection
