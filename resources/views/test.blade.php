@foreach($sale->productSale as $productSale)
	@foreach($productSale->product as $product)
		{{ $product->name }}
	@endforeach
@endforeach