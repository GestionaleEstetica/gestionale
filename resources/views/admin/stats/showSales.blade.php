@extends('layouts.default')
@section('title')
	Vendite Totali
@endsection

@section('body')
<div class="row">
	<div class="col-md-8 col-sm-12 col-lg-10">
		<div class="panel panel-primary">
			<div class="panel-heading">
                <h3 style="margin:0">
                    <span>Calendario</span>
                </h3>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead class="thead-light">
							<tr>
								@foreach ($users as $user)
								<th class="text-center">{{$user->first_name}}</th>
								@endforeach
							</tr>
						</thead>
						<tbody>
							@foreach ($users as $user)
								<td>
									<table class="table table-striped table-bordered table-hover">
						        <tbody>
											@foreach ($sales as $sale)
						            <tr>
													@if ($user->id == $sale->user_id)
						                <td>
						                    <div class="panel panel-default">
						                        <div class="panel-heading">
						                            Vendite N
						                        </div>
						                        <!-- /.panel-heading -->
						                        <div class="panel-body">
						                            <!-- Nav tabs -->
						                            <ul class="nav nav-tabs">
																					<li class="active"><a href="#info{{ $sale->id }}" data-toggle="tab">Informazioni</a>
					                                </li>
					                                <li><a href="#products{{ $sale->id }}" data-toggle="tab">Prodotti</a>
					                                </li>
					                                <li><a href="#treatments{{ $sale->id }}" data-toggle="tab">Trattamenti</a>
					                                </li>
						                            </ul>

						                            <!-- Tab panes -->
						                            <div class="tab-content">
						                                <div class="tab-pane fade active in" id="info{{ $sale->id }}">
																							<br>
																							<p> <b>Vendita effettuata il: </b> {{$sale->created_at}} </p>
						                                </div>
						                                <div class="tab-pane fade" id="products{{ $sale->id }}">
																							<p>{{$sale}}</p>
						                                </div>
						                                <div class="tab-pane fade" id="treatments{{ $sale->id }}">
						                                    <h4>Messages Tab</h4>
						                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						                                </div>
						                            </div>
						                        </div>
						                        <!-- /.panel-body -->
						                    </div>
						                    <!-- /.panel -->

														</td>
														@endif
						            </tr>
												@endforeach
						        </tbody>
						    </table>
              </td>
							@endforeach
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
