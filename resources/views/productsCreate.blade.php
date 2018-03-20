<form action="/prodotti" method="POST">
  {!! csrf_field() !!}
<input type="text" name="name">
<input type="text" name="marca">
<input type="number" step="any" name="price">
<input type="submit" value="registraprodotto">
</form>
