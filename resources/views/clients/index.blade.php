@extends('layouts.default')
@section('title')
	Mostra tutti
@endsection
@section('body')
	<div class="col-lg-4">
		<!-- include('alert') -->
		<form method="GET" action ="/clients/search">
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
                            <h2 style="margin:0px">Prodotti</h2>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
								          <th>Codice</th>
								          <th>Nome</th>
								          <th>Cognome</th>
								          <th>Telefono</th>
								          <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
					       @forelse($clients as $client)
					        <tr>
					          <td>{{ $client->id }}</td>
					          <td>{{ $client->first_name }}</td>
					          <td>{{ $client->last_name }}</td>
					          <td>{{ $client->phone }}</td>
					          <td>{{ $client->email }}</td>

							<td class="text-center">
					          	<form action="/clients/{{ $client->id }}/edit" method="GET">
							  <button type="submit" class="btn btn-warning btn-sm">
					          <div class="glyphicon glyphicon-pencil"></div>
							</button>
							  
							  </form>
							</td>

					          <td class="text-center">
					          	<form action="/clients/{{ $client->id }}" method="POST" style="display: inline;">
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
                            <div>{{ $clients->links() }}</div>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>

@endsection