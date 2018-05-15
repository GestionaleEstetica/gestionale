@extends('layouts.default')
@section('title')
	Appuntamenti Prenotati
@endsection

@section('body')

<div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1 toppad" >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Appuntamenti prenotati per il cliente {{$client->first_name}} {{$client ->last_name}}</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class=" col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="/vendor/images/avatar.png" class="img-circle img-responsive"> </div>
                <div class=" col-md-9 col-lg-9 ">
                  <table class="table table-striped table-bordered table-hover">
                    <tbody class="text-center">
                      <td>Data</td>
                      <td>Orario</td>
                      <td>Utente</td>
                      <td>Trattamenti</td>
                      <td>Descrizione</td>
                      @foreach ($client->dates->sortBy('date') as $date )
                      <tr>
                        <td>{{ Carbon\Carbon::createFromFormat('Y-m-d', ($date->date))->format('d-m-Y') }}</td>
                        <td>{{ $date->time }}</td>
                        <td>{{ $date->user->first_name}}</td>
                        <td>
                          @foreach ($date->treatments as $treatment)
                            @if ( $date->treatments->count() > 1 ) | {{ $treatment->name}}
                            @else {{ $treatment->name}}
                            @endif
                          @endforeach
                        </td>
                        <td>{{ $date->description}}
                      </tr>
                    @endforeach
                  </table>
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <button class="btn btn-md btn-info" onclick="history.back();">Indietro</button>
                        </span>
                    </div>

          </div>
        </div>
      </div>
    </div>



@endsection
