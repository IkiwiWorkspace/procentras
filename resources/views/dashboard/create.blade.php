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
                <div class="card-header"><strong>Pridėti naują produktą</strong></div>
                <div class="card-body">
                    <form action="{{ route('admin.product.create') }}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Produkto pavadinimas</label>
                            <input class="form-control" id="title" type="text" placeholder="Įveskite produkto pavadinimą"
                                name="title" value="{{ old('title') }}">
                        </div>
                        <label for="category">Produkto kategorija</label>
                        <div class="form-group">
                            @foreach ($categories as $category)
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input class="custom-control-input" type="checkbox" value="{{ $category->id }}"
                                        id="customCheck-{{ $category->id }}" name="category_id[]"
                                        {{ (is_array(old('category_id')) and in_array($category->id, old('category_id'))) ? ' checked' : '' }}>
                                    <label class="custom-control-label" for="customCheck-{{ $category->id }}">
                                        {{ $category->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-8">
                                <label for="category">Produkto editorius</label>
                                <select class="custom-select" id="inputGroupSelect01" name="builder_id">
                                    <option selected>Pasirinkite produkto editorių</option>
                                    @foreach ($builders as $builder)
                                        <option value="{{ $builder->id }}" {{ old('builder_id') ? ' selected' : '' }}>
                                            {{ $builder->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="price">Kaina</label>
                                <input class="form-control" id="price" type="text" placeholder="Produkto kaina"
                                    name="price" value="{{ old('price') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Produkto nuotrauka</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="image">
                                <label class="custom-file-label" for="customFile">Produkto nuotrauka</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">Produkto aprašymas</label>
                            <textarea class="form-control" id="description" type="text" rows="5"
                                name="description">{{ old('description') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Pridėti</button>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#customFile').on('change', function() {
            var fileName = $(this).val().replace('C:\\fakepath\\', " ");;
            $(this).next('.custom-file-label').html(fileName);
        })
    </script>
@endsection
