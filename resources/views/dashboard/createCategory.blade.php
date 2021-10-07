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
                <div class="card-header"><strong>Pridėti naują kategoriją</strong></div>
                <div class="card-body">
                    <form action="{{ route('admin.create.category') }}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Kategorijos pavadinimas</label>
                            <input class="form-control" id="name" type="text" placeholder="Įveskite kategorijos pavadinimą"
                                name="name" value="{{ old('name') }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Pridėti</button>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
