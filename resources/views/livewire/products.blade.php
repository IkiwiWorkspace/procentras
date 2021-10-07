<div class="col-lg-9">
    <div class="row mt-4">
        @foreach ($products as $product)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 hover-zoom">
                    <a href="{{ route('product', $product->id) }}">
                        <img class="card-img-top" src="{{ asset('/storage/images/products/' . $product->image) }}"
                            alt="" style="box-shadow: none;">
                        <div class="card-body">
                            <h6 class="card-title">
                                <a href="{{ route('product', $product->id) }}">{{ $product->title }}</a>
                            </h6>
                            <h5>$ {{ number_format($product->price, 2) }}</h5>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('product.addToCart', $product->id) }}" class="btn btn-sm btn-primary">Į
                                krepšelį</a>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    {{ $products->links('vendor.pagination.custom') }}
</div>
