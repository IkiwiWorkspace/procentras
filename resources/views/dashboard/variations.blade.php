@extends('dashboard.dashboard')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="card-header"><strong>Pridėti naują variaciją</strong></div>
                <div class="card-body">
                    <form action="{{ route('admin.variation.create') }}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Variacijos pavadinimas</label>
                            <input class="form-control" id="name" type="text" placeholder="Įveskite variacijos pavadinimą"
                                name="name" value="{{ old('name') }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Pridėti</button>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session()->has('messageValueCreate'))
                    <div class="alert alert-success">
                        {{ session()->get('messageValueCreate') }}
                    </div>
                @endif
                <div class="card-header"><strong>Pridėti reikšmes varaicijai</strong></div>
                <div class="card-body">
                    <form action="{{ route('admin.add.values') }}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="variation">Variacijos pavadinimas</label>
                            <select class="custom-select" id="inputGroupSelect01" name="variation_id">
                                <option selected>Pasirinkite Variacijos pavadinimą</option>
                                @foreach ($variations as $variation)
                                    <option value="{{ $variation->id }}" {{ old('variation_id') ? ' selected' : '' }}>
                                        {{ $variation->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="values">Įveskite variacijos reikšmes, atskirdami ","</label>
                                <input class="form-control" type="text" placeholder="pvz.: 15x60,30x60" name="name"
                                    value="{{ old('name') }}" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="prices">Įveskite reikšmės kainas, atskirdami ","</label>
                                <input class="form-control" type="text" placeholder="pvz.: 20,30" name="price"
                                    value="{{ old('price') }}" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Pridėti</button>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session()->has('messageVariationAdded'))
                    <div class="alert alert-success">
                        {{ session()->get('messageVariationAdded') }}
                    </div>
                @endif
                <div class="card-header"><strong>Priskirti variacijas produktui</strong></div>
                <div class="card-body">
                    <form action="{{ route('admin.add.variations') }}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="product">Produkto pavadinimas</label>
                            <select class="custom-select" id="inputGroupSelect01" name="product_id">
                                <option selected>Pasirinkite produkto pavadinimą</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">
                                        {{ $product->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="variation_id">Reikšmė</label>
                            <select id="choices-multiple-remove-button" class="form-control" name="variations[]" multiple>
                                <option value="" selected>Pasirinkite variacijas</option>
                                @foreach ($variations as $variation)
                                    <option value="{{ $variation->id }}">
                                        {{ $variation->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Pridėti</button>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
