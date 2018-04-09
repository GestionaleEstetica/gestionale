@extends('layouts.default')
@section('title')
	Scheda appuntamento
@endsection

@section('body')
	<div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-8 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-2 toppad" >
   
   
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Appuntamento</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://14.139.245.36/esp/images/4.png" class="img-circle img-responsive"> </div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td><b>ID trattamento:</b></td>
                        <td>{{$date->id}}</td>
                      </tr>
                      <tr>
                        <td><b>Cliente:</b></td>
                        <td><a href="/clients/{{$date->id}}">{{ $client->first_name }} {{ $client->last_name }}</a></td>
                      </tr>
                      <tr>
                        <td><b>Fissato il giorno:</b></td>
                        <td>{{$date->date}}</td>
                      </tr>
                        <td><b>Orario:</b></td>
                        <td>{{$date->time}}</td>
                      </tr>
                        <tr>
                        <td><b>E' già concluso?</b></td>
                        <td>@if($date->done == 0) No @else Si @endif</td>
                      </tr>
                      <tr>
                        <td><b>Descrizione opzionale:</b></td>
                        <td>{{$date->description}}</td>
                      </tr>
                      <tr>
                        <td><b>Creato il giorno:</b></td>
                        <td>{{$date->created_at}}</td>
                      </tr>
                      @if($date->created_at != $date->updated_at)
                      <tr>
                        <td><b>Ultimo aggiornamento:</b></td>
                        <td>{{$date->updated_at}}</td>
                      </tr>
                      @endif
                     <tr>
                        <td><b>Trattamenti fissati:</b></td>
                        <td>
                        	<ul>
                        		@foreach($date->treatments as $treatment)
                        		<li>
                        			Trattamento: {{$treatment->name}}<br>
                        			Quantità: {{ $treatment->pivot->quantity }}
                        		</li>
                        		@endforeach
                        	</ul>
                        </td>
                      </tr>
                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                    <a href="/dates/{{ $date->id }}/edit" class="btn btn-sm btn-warning">Modifica</a>
                    <form action="/dates/{{ $date->id }}" method="POST" style="display:inline">
            			{{ csrf_field() }}
					  	{{ method_field('DELETE') }}
                    	<input type="submit" class="btn btn-sm btn-danger" value="Elimina">
                    </form>
                    <button onclick="window.history.back();" class="btn btn-sm btn-info">Torna indietro</button>
                    </div>
          </div>
        </div>
      </div>
    </div>
@endsection
