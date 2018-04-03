@extends('layouts.default')
@section('title')
	Calendario
@endsection

@section('body')
<body>
	<div class="col-md-8 col-sm-12 col-lg-8 col-md-offset-2">
		<div class="panel panel-primary">
  		<div id='calendar'></div>
		</div>
	</div>
</body>
@endsection

<script type="text/javascript">
    var dates = <?php echo json_encode($dates); ?>;
</script>

@section('otherscript')
<link href='/css/fullcalendar.min.css' rel='stylesheet' />
<link href='/css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='/js/lib/moment.min.js'></script>
<script src='/js/fullcalendar.min.js'></script>
<script src='/js/calendar.js'></script>
@endsection
