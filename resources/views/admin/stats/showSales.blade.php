@extends('layouts.default')
@section('title')
	Vendite Totali
@endsection

@section('body')
<div class="row">
	<div class="col-md-8 col-sm-12 col-lg-10 col-md-offset-1 col-lg-offset-1 col-sm-offset-1">
		<div class="panel panel-primary">
			<div class="panel-heading">
                <h3 style="margin:0">
                    <span>Vendite totali</span>
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
						                    <div class="panel panel-default">
						                        <div class="panel-heading" style="background-color:#b3d9ff;">
						                            <b><center>Vendite N{{$sale->id}}</b></center>
						                        </div>
						                        <!-- /.panel-heading -->
						                        <div class="panel-body" >
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
																							<p><b>Vendita effettuata il: </b> {{$sale->created_at}} </p>
						                                </div>
						                                <div class="tab-pane fade" id="products{{ $sale->id }}">
																							@foreach ($sale->products as $product)
																							<p>
																								<b>Nome:</b> {{$product->name}} |
																								<b>Quantità:</b> {{$product['pivot']->quantity}} |
																								<b>Marca:</b> {{$product->brand}} <br>
																							</p>
																							@endforeach
						                                </div>
						                                <div class="tab-pane fade" id="treatments{{ $sale->id }}">
																							@foreach ($sale->treatments as $treatment)
																							<p>{{$treatment->name}}</p>
																							@endforeach
						                                </div>
						                            </div>
						                        </div>
						                        <!-- /.panel-body -->
						                    </div>
						                    <!-- /.panel -->
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
