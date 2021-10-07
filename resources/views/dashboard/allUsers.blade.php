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
                <div class="card-header"><i class="fa fa-align-justify"></i> Vartotojai</div>
                <div class="card-body">
                    <table class="table table-responsive-sm">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="align-middle">{{ $user->name }}</td>
                                    <td class="align-middle">{{ $user->email }}</td>
                                    <td class="align-middle">
                                        @if ($user->is_admin)
                                            <span class="badge badge-primary">Admin</span>
                                        @else
                                            <span class="badge badge-warning">Customer</span>
                                        @endif
                                    </td>
                                    <td class="align-middle"><a href="{{ route('admin.user.edit', $user->id) }}"
                                            class="btn btn-success">Edit</a></td>
                                    <td class="align-middle">
                                        <form action="{{ route('admin.user.delete', $user->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <input type="submit" class="btn btn-danger delete" value="Delete">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </div>
@endsection
