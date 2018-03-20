<form action="/prodotti/aggiungi" method="POST">
  {!! csrf_field() !!}
<input type="text" name="name">
<input type="text" name="brand">
<input type="number" name="quantity">
<input type="number" step="any" name="price">
<input type="submit" value="registraprodotto">
</form>
