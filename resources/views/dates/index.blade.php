@extends('layouts.default')
@section('title')
	Calendar
@endsection

@section('body')
<body>
  <div id='calendar'></div>

<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>
</body>
@endsection

@section('otherscript')
<link href='/css/fullcalendar.min.css' rel='stylesheet' />
<link href='/css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='/js/lib/moment.min.js'></script>
<script src='/js/fullcalendar.min.js'></script>
<script src='/js/calendar.js'></script>
@endsection
