@extends('dashboard.dashboard')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header"><i class="fa fa-align-justify"></i> Products</div>
                <div class="card-body">
                    <table class="table table-responsive-sm">
                        <thead>
                            <tr>
                                <th class="align-middle">Product image</th>
                                <th class="align-middle">Product title</th>
                                <th class="align-middle">Edit</th>
                                <th class="align-middle">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td class="align-middle"><img class="img-thumbnail" width="150px" height="150px"
                                            src="{{ asset('/storage/images/products/' . $product->image) }}" alt=""></td>
                                    <td class="align-middle">{{ $product->title }}</td>
                                    <td class="align-middle"><a href="{{ route('admin.product.edit', $product->id) }}"
                                            class="btn btn-success">Edit</a></td>
                                    <td class="align-middle">
                                        <form action="{{ route('admin.product.delete', $product->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <input type="submit" class="btn btn-danger delete" value="Delete">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.delete').click(function(e) {
            e.preventDefault()
            if (confirm('Are you sure?')) {
                $(e.target).closest('form').submit();
            }
        });
    </script>
@endsection
