<h1>TRATTAMENTI</h1>
 @foreach ( $alltreat as $treat)
    @if( count($treat) >0 ) {{ $treat }}
    @endif
 @endforeach
<br><h1>PRODOTTI</h1><br>
 @foreach ( $allproduct as $product)
    @if( count($product) >0 ) {{ $product }}
    @endif
 @endforeach
