@extends('layouts.default')
@section('title')
	Mostra Utenti
@endsection
@section('body')
	<div class="col-lg-4 col-lg-offset-1">
		<!-- include('alert') -->
	</div>
	<div class="row">
<div class="col-md-8 col-sm-12 col-lg-10 col-md-offset-1">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h2 style="margin:0px; text-align:center; font-weight:bold">Utenti</h2>
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
                                        </tr>
                                    </thead>
                                    <tbody>
					       @forelse($users as $user)
					        <tr>
					          <td>{{ $user->id }}</td>
					          <td>{{ $user->first_name }}</td>
					          <td>{{ $user->last_name }}</td>
					          <td>{{ $user->phone }}</td>

							<td class="text-center">
					          	<form action="/users/{{ $user->id }}/edit" method="GET">
							  <button type="submit" class="btn btn-warning btn-sm">
					          <div class="glyphicon glyphicon-pencil"></div>
							</button>
							  </form>
							</td>

					          <td class="text-center">
					          	<form action="/users/{{ $user->id }}" method="POST" style="display: inline;">
							  	{{ csrf_field() }}
							  	{{ method_field('DELETE') }}

							  <button type="submit" class="btn btn-danger btn-sm">
					          <div class="glyphicon glyphicon-remove"></div>
								</button>

							  </form>
							</td>

					        </tr>
					        @empty<center><strong> Nessun utente registrato</strong></center>

					        @endforelse
      					</tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>

@endsection
