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
                <div class="card-header"><strong>Pridėti naują vartotoją</strong></div>
                <div class="card-body">
                    <form action="{{ route('admin.user.create.submit') }}" method="POST" enctype="multipart/form-data"
                        oninput='password1.setCustomValidity(password1.value != password.value ? "Slaptažodis nesutampa." : "")'>
                        <div class="form-group">
                            <label for="name">Vartotojo vardas</label>
                            <input class="form-control" id="name" type="text" placeholder="Įveskite vartotojo vardą"
                                name="name" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">El-pašto adresas</label>
                            <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                                placeholder="vardenis@gmail.com" value="{{ old('email') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword4">Slaptažodis</label>
                            <input type="password" name="password" class="form-control" id="inputPassword4"
                                placeholder="Slaptažodis" required>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">Patvirtinkite slaptažodį</label>
                            <input type="password" name="password1" class="form-control" id="inputPassword"
                                placeholder="Pakartokite įvestą slaptažodį">
                        </div>
                        <div class="form-group">
                            <label for="selectRole">Vartotojo rolė</label>
                            <select id="selectRole" class="custom-select" name="is_admin" required>
                                <option selected>Pasirinkite vartotojo rolę</option>
                                <option value="0" @if (old('is_admin') == '0') selected="selected" @endif>Vartotojas</option>
                                <option value="1" @if (old('is_admin') == '1') selected="selected" @endif>Administratorius</option>
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
