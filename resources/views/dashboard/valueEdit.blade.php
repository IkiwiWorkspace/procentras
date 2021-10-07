@extends('dashboard.dashboard')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                @if (session()->has('value'))
                    <div class="alert alert-success">
                        {{ session()->get('value') }}
                    </div>
                @endif
                <div class="card-header"><i class="fa fa-align-justify"></i> Reikšmė: {{ $value->name }}</div>
                <div class="card-body">
                    <form action="{{ route('admin.value.edit', $value->id) }}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="name">Reikšmės pavadinimas</label>
                                <input class="form-control" id="value_name" type="text"
                                    name="value_name" value="{{ $value->name }}" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="name">Reikšmės kaina</label>
                                <input class="form-control" id="price" type="text"
                                    name="price" value="{{ $value->price }}" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Atnaujinti</button>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection