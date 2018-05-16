@extends('layouts.default')
@section('title')
	Mostra Cliente
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
                        <td>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $client->created_at)->format('d-m-Y H:i:00')}}</td>
                      </tr>
                      <tr>
                        <td>Data compleanno:</td>
                        <td>{{Carbon\Carbon::createFromFormat('Y-m-d', $client->birthday)->format('d-m-Y')}}</td>
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
                        <td>{{$client->promozioni}}</td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <button class="btn btn-md btn-info" onclick="history.back();">Indietro</button>
												<button class="btn btn-md btn-warning" onclick="location.href='/clients/{{$client->id}}/edit'">Modifica</button>
												<button class="btn btn-md btn-success" onclick="location.href='/clients/{{$client->id}}/showDates'">Mostra Appuntamenti</button>

                        </span>
                    </div>

          </div>
        </div>
      </div>
    </div>
<script src="/js/userprofile.js"></script>
@endsection
