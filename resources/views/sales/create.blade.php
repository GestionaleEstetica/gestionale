@extends('layouts.default')
@section('title')
	Aggiungi
@endsection

@section('body')

  <div id="app">
    <sales  :products="{{ json_encode($products) }}" 
            :treatments="{{ json_encode($treatments) }}"></sales>
	</div>
</div>
    <script src="/vendor/jquery/jquery.js"></script>
    <script src="/js/script.js"></script>
</body>
@endsection
