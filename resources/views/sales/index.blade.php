@extends('layouts.default')
@section('title')
	Mostra tutte
@endsection

@section('body')
@foreach($sales as $sale)
    <div class="col-md-6 col-sm-12 col-lg-4 col-md-offset-1">
	<div class="panel panel-default">
                        <div class="panel-heading">
                            <span>Vendita N° {{ $sale->id }}</span>
							@if($sale->created_at != $sale->updated_at)
                            	<span class="pull-right" style="font-size:0.8em">* Vendita modificata il <b>{{ $sale->created_at }}</b></span>
                            @endif
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home{{ $sale->id }}" data-toggle="tab">Informazioni</a>
                                </li>
                                <li><a href="#profile{{ $sale->id }}" data-toggle="tab">Prodotti</a>
                                </li>
                                <li><a href="#messages{{ $sale->id }}" data-toggle="tab">Trattamenti</a>
                                </li>

                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home{{ $sale->id }}">
                                    <br>
                                    <p>Vendita effettuata il <b>{{ $sale->created_at }}</b></p>
                                    <p>Segnata da: <b>{{ $sale->user->first_name }} {{ $sale->user->last_name }}</b>
                                    <p class="pull-right">
                                        <form method="POST" action="/sales/{{ $sale->id }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-danger">
                                                <div class="glyphicon glyphicon-remove"></div>
                                            </button>
                                        </form>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="profile{{ $sale->id }}">
                                    <h4><b>Prodotti venduti</b></h4>
                                    @foreach($sale->products as $product)
                                    <ul>
                                        <li><b>Nome</b>: {{ $product->name }} | <b>Brand</b>: {{ $product->brand }} | <b>Quantità</b>: {{ $product->pivot->quantity }}</li>
                                    </ul>
                                    @endforeach
                                </div>
                                <div class="tab-pane fade" id="messages{{ $sale->id }}">
                                    <h4><b>Trattamenti venduti</b></h4>
                                    @foreach($sale->treatments as $treatment)
                                    <ul>
                                        <li><b>Nome</b>: {{ $treatment->name }} | <b>Quantità</b>: {{ $treatment->pivot->quantity }}</li>
                                    </ul>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endforeach
@endsection