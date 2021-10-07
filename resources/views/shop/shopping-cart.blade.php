@extends('layouts.master')

@section('title')
    Procentras
@endsection

@section('content')
    @if (Session::has('cart'))
        <section class="shopping-cart dark">
            <div class="container">
                <div class="block-heading">
                    <h2>Krepšelis</h2>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-md-12 col-lg-8">
                            <div class="items container">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="5">Produktas</th>
                                            <th>Kaina</th>
                                            <th>Kiekis</th>
                                            <th class="text-right">Suma</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td colspan="1" class="align-middle"><a href="{{ route('cart.remove', $product['item']['id']) }}"
                                                        class="remove-all">x</a></td>
                                                <td colspan="2" class="align-middle"><img
                                                        class="img-fluid mx-auto d-block image"
                                                        src="{{ asset('/storage/images/products/' . $product['item']['image']) }}"
                                                        width="50px"></td>
                                                <td class="align-middle"><a href="#">{{ $product['item']['title'] }}</a>
                                                </td>
                                                <td colspan="2" class="align-middle"><a>$
                                                        {{ $product['item']['price'] }}</a></td>
                                                <td class="align-middle">
                                                    <div class="quantity buttons_added">
                                                        <a href="{{ route('cart.reduce', $product['item']['id']) }}" class="minus button is-form">-</a>
                                                        <p type="number" id="quantity_61408b568a79b"
                                                            class="input-text qty-custom text-center" step="1" min="0" max="13"
                                                            value="{{ $product['qty'] }}" title="Kiekis" size="3"
                                                            inputmode="numeric">{{ $product['qty'] }}</p>
                                                        <a href="{{ route('cart.increase', $product['item']['id']) }}" class="plus button is-form">+</a>
                                                    </div>
                                                </td>
                                                <td class="text-right align-middle">$ {{ $product['price'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <div class="summary">
                                <h3>Krepšelio skaičiavimas</h3>
                                <div class="summary-item"><span class="text">Suma</span><span
                                        class="price">$ {{ $totalPrice }}</span></div>
                                <div class="summary-item"><span class="text">Pristatymas</span><span
                                        class="price">$ 0</span></div>
                                <div class="summary-item"><span class="text">Viso suma (su PVM)</span><span
                                        class="price">$ {{ $totalPrice }}</span></div>
                                <a href="{{ route('checkout') }}" class="btn btn-primary btn-lg btn-block mt-4">Apmokėjimas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <div class="container text-center">
            <div class="card">
                <div class="card-body">
                    <h3>Produktų krepšelyje nėra</h3>
                </div>
            </div>
        </div>
    @endif
@endsection
