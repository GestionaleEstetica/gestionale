@extends('layouts.default')
@section('title')
  Statistiche
@endsection
@section('body')
  <div id="app">
    <stats  
    :products="{{ json_encode($products) }}"
    :treatments="{{ json_encode($treatments) }}"
    :clients="{{ json_encode($clients) }}"
    :dates="{{ json_encode($dates) }}"
    :sales="{{ json_encode($sales) }}">
    </stats>
  </div>
<script src="{{ asset('js/app.js') }} "></script>
@endsection