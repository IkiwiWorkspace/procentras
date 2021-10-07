@extends('dashboard.dashboard')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                @if (session()->has('variation'))
                    <div class="alert alert-success">
                        {{ session()->get('variation') }}
                    </div>
                @endif
                <div class="card-header"><i class="fa fa-align-justify"></i> Variacija: {{ $variation->name }}</div>
                <div class="card-body">
                    <form action="{{ route('admin.variation.edit', $variation->id) }}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Variacijos pavadinimas</label>
                            <input class="form-control" id="name" type="text"
                                name="variation_name" value="{{ $variation->name }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Atnaujinti</button>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
            <div class="card">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="card-header"><i class="fa fa-align-justify"></i> Variacijų reikšmės</div>
                <div class="card-body">
                    <table class="table table-responsive-sm">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($variation->values()->get() as $value)
                                <tr>
                                    <td class="align-middle">{{ $value->name }}</td>
                                    <td class="align-middle">{{ $value->price }} eur</td>
                                    <td class="align-middle"><a href="{{ route('admin.get.edit.value', $value->id) }}"
                                            class="btn btn-success">Edit</a></td>
                                    <td class="align-middle">
                                        <form action="{{ route('admin.delete.value', ['variation_id' => $variation->id, 'value_id' => $value->id]) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <input type="submit" class="btn btn-danger delete" value="Delete">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection