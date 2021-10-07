@extends('layouts.master')

@section('title')
    Procentras
@endsection

@section('content')
    <section class="section-1">
        <img src="{{ asset('/storage/images/pro-centras-section-1.png') }}">
    </section>

    <section class="section-2">
        <div class="container">
            <h2 class="my-h2">{{ $categories[0]->name }}</h2>
            @foreach ($products->chunk(4) as $productChunk)
                <div class="row justify-content-center">
                    @foreach ($productChunk as $product)
                        @if ($product->category()->allRelatedIds()[0] == $categories[0]->id)
                            <div class="col-lg-3 col-sm-6 my-col">
                                <a href="@if ($product->builder_id == 2){{ route('builder', $product->id) }}
                                        @elseif($product->builder_id == 3){{ route('photolarge', $product->id) }}
                                        @elseif($product->builder_id == 5){{ route('photoCanvas', $product->id) }}
                                        @elseif($product->builder_id == 4) {{ route('shop') }} 
                                        @else
                                        #
                                        @endif">
                                    <div class="card card-custom text-center h-100 d-flex" style="width: 100%;">
                                        <img class="card-img-top"
                                            src="{{ asset('/storage/images/products/' . $product->image) }}"
                                            alt="card card-custom image cap">
                                        <div class="card-body align-items-center d-flex justify-content-center">
                                            <p class="card-text">{{ $product->title }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
    </section>


    <section class="section-3">
        <div class="container">
            <h2 class="my-h2">{{ $categories[1]->name }}</h2>
            @foreach ($products->chunk(4) as $productChunk)
                <div class="row justify-content-center">
                    @foreach ($productChunk as $product)
                        @if ($product->category()->allRelatedIds()[0] == $categories[1]->id)
                        <div class="col-lg-3 col-sm-6 my-col">
                                {{-- prideti route i page --}}
                                <a href="{{ route('services', $product->id) }}">
                                    <div class="card text-center h-100 d-flex" style="width: 100%;">
                                        <img class="card-img-top"
                                            src="{{ asset('/storage/images/products/' . $product->image) }}"
                                            alt="Card image cap">
                                        <div class="card-body align-items-center d-flex justify-content-center">
                                            <p class="card-text">{{ $product->title }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
    </section>

@endsection
