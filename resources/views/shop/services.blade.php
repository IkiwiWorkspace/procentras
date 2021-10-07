@extends('layouts.master')

@section('content')


    <section class="section-1">
        <img src="{{ asset('/storage/images/pro-centras-section-1.png') }}">
    </section>

    <section class="section-contact-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 my-col align-self-start">
                    <img src="{{ asset('/storage/images/products/' . $product->image) }}" width="100%" alt="">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 my-col">
                    <h3 class="text-uppercase">{{ $product->title }}</h3>
                    <hr class="my-hr" />
                    <h4 class="product-category-text text-uppercase">Kategorija: {{ $categories[0]->name }}</h4>
                    <p class="text-justify">{{ $product->description }}</p>
                    
                </div>
            </div>
        </div>
    </section>

@endsection
