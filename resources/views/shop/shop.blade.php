@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    @livewire('sidebar')
                    @livewire('products')
                </div>
            </div>
        </div>
    </div>
@endsection
