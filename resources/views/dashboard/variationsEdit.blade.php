@extends('dashboard.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="card-header"><i class="fa fa-align-justify"></i> Variacijos</div>
                <div class="card-body">
                    <table class="table table-responsive-sm">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($variations as $variation)
                                <tr>
                                    <td class="align-middle">{{ $variation->name }}</td>
                                    <td class="align-middle"><a href="{{ route('admin.get.edit.variation', $variation->id) }}"
                                            class="btn btn-success">Edit</a></td>
                                    <td class="align-middle">
                                        <form action="{{ route('admin.variation.delete', $variation->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <input type="submit" class="btn btn-danger delete" value="Delete">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $variations->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </div>
@endsection