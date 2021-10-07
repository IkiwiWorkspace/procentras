@extends('layouts.master')

@section('content')
    <section class="section-1">
        <img src="{{ asset('/storage/images/pro-centras-section-1.png') }}">
    </section>

    <section class="section-contact-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 my-col align-self-start">
                    <img src="{{ asset('/storage/images/products/' . $product->image) }}" width="70%" alt="">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 my-col">

                    <h3 class="text-uppercase">{{ $product->title }}</h3>
                    <h4 class="product-category-text text-uppercase">Kategorija: {{ $categories[0]->name }}</h4>
                    <hr class="my-hr" />
                    <p class="text-justify">{{ $product->description }}</p>
                    <h6 class="d-inline-block">$ {{ $product->price }}</h6>
                     {{-- <a href="@if($product->builder_id == 3){{ route('photolarge', $product->id) }}@endif">Užsakyti</a> --}}
                    <a href="{{ route('product.addToCart', $product->id) }}" class="btn btn-primary">Į krepšelį</a>
                </div>
            </div>
        </div>
    </section>
@endsection
