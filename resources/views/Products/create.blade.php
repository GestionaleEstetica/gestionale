
<form action="/products" method="POST">
  {!! csrf_field() !!}
<input type="text" name="name" placeholder="Nome">
<input type="text" name="brand" placeholder="Brand">
<input type="number" name="quantity" placeholder="Quantità">
<input type="number" step="any" name="price" placeholder="Price">
<input type="submit" value="Crea">
</form>
