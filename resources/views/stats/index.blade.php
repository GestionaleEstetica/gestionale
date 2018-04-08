@extends('layouts.default')
@section('title')
	Mostra tutti
@endsection
@section('body')
<div class="col-lg-4 col-lg-offset-1">
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
<div class="col-md-8 col-sm-12 col-lg-10 col-md-offset-1">
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
                        <th>Appuntamenti Conclusi</th>
                        <th>Vendite Effettuate</th>
                        <th>Trattamenti Venduti</th>
                        <th>Prodotti Venduti</th>
                        <th>Entrate Totali</th>
                                      </tr>
                                  </thead>
                                  <tbody>

                <tr>
                  <td>{{ count($dates) }}</td>
                  <td>{{ count($sales) }}</td>
                  <td>{{ count($treatments) }}</td>
                  <td>{{ count($products)}}</td>
                  <td>{{ $gain }}</td>

            <td class="text-center">
                    <form action="" method="GET">
              <button type="submit" class="btn btn-warning btn-sm">
                  <div class="glyphicon glyphicon-pencil"></div>
            </button>

              </form>
            </td>

                  <td class="text-center">
                    <form action="" method="POST" style="display: inline;">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}

              <button type="submit" class="btn btn-danger btn-sm">
                  <div class="glyphicon glyphicon-remove"></div>
              </button>

              </form>
            </td>

                </tr>


              </tbody>
                              </table>
                          <div></div>
                          </div>
                          <!-- /.table-responsive -->
                      </div>
                      <!-- /.panel-body -->
                  </div>
                  <!-- /.panel -->
              </div>
          </div>

@endsection
