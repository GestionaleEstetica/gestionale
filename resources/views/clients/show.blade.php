@extends('layouts.default')
@section('title')
	Aggiungi
@endsection

@section('body')

<div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1 toppad" >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">{{$client->first_name}} {{$client ->last_name}}</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class=" col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="/vendor/images/avatar.png" class="img-circle img-responsive"> </div>
                <div class=" col-md-9 col-lg-9 ">
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                          <td>Data registrazione:</td>
                        <td>{{$client->created_at}}</td>
                      </tr>
                      <tr>
                        <td>Data compleanno:</td>
                        <td>{{$client->birthday}}</td>
                      </tr>
                      <tr>
                        <td>Appuntamenti conclusi</td>
                        <td>{{$client->done_dates}}</td>
                      </tr>
                      <tr>
                        <td>Telefono</td>
                        <td>{{$client->phone}}</td>
                      </tr>
                         <tr>
                             <tr>
                        <td>Email</td>
                        <td>{{$client->email}}</td>
                      </tr>
                      <tr>
                        <td>Offerte attive</td>
                        <td></td>
                      </tr>

                    </tbody>
                  </table>

									<form action="{{ action('PromosController@store') }}" method="POST">
										{!! csrf_field() !!}
										<input type="hidden" name="client_id" value="{{$client->id}}" />
										<input type="text" name="treatment_id" /><input type="text" name="quantity" />
										<button type="submit" class="btn btn-primary sm"> Aggiungi Promozione
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <button class="btn btn-md btn-info" onclick="history.back();">Indietro</button>
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                          <form action="/clients/{{ $client->id }}/edit" method="GET">
                            <button type="submit" class="btn btn-warning btn-sm">
                              <div class="glyphicon glyphicon-pencil"></div>
                            </button>
                          </form>

                        </span>
                    </div>

          </div>
        </div>
      </div>
    </div>
<script src="/js/userprofile.js"></script>
@endsection
