@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                @foreach ($variations as $variation)
                    <div class="card-body text-center">
                        <h4>{{ $variation->name }}</h4>
                        @foreach ($variation->values()->get() as $value)
                            @if ($variation->name == 'Tradicinio formato nuotraukų dydžiai')
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input class="custom-control-input" type="checkbox" value="{{ $value->price }}"
                                        id="customCheck-{{ $value->id }}" name="value_id_{{ $variation->id }}">
                                    <label class="custom-control-label" for="customCheck-{{ $value->id }}">
                                        {{ $value->name }}
                                    </label>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">

        </div>
        <div class="col-sm-6">
            <div style="align-items: center">
                <div class="card-body">
                    <form action="{{ route('builder.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="document">Documents</label>
                            <div class="needsclick dropzone" id="document-dropzone">

                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit">Į krepšelį</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="">
                <h3>Kaina</h3>
                <div class=" card-body">
                <p>Viso: </p>
                <form action="#" method="post">
                    <label for="price" class="product-price">0.00</label>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        // Dropzone.options.dropzone = {
        //     maxFilesize: 12000000,
        //     renameFile: function(file) {
        //         let dt = new Date();
        //         let time = dt.getTime();
        //         return time + file.name;
        //     },
        //     acceptedFiles: ".jpeg, .jpg, .png",
        //     addRemoveLinks: true,
        //     timeout: 5000000,
        //     removedfile: function(file) {
        //         let name = file.upload.filename;
        //         $.ajax({
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             },
        //             type: 'POST',
        //             url: '{{ url('builder/delete') }}',
        //             data: {
        //                 filename: name
        //             },
        //             success: function(data) {
        //                 console.log("File has benn removed");
        //             },
        //             error: function(e) {
        //                 console.log(e);
        //             }
        //         });
        //         let fileRef;
        //         return (fileRef = file.previewElement) != null ? fileRef.parentNode.removeChild(file
        //             .previewElement) : void 0;
        //     },
        //     success: function(file, response) {
        //         console.log(response);
        //         let length = $('.dz-image').length;
        //         console.log(length);
        //     },
        //     error: function(file, response) {
        //         return false;
        //     }
        // };
        // //allow checkbox select only once
        // $("input:checkbox").on('click', function() {
        //     var $box = $(this);
        //     if ($box.is(":checked")) {
        //         var group = "input:checkbox[name='" + $box.attr("name") + "']";
        //         $(group).prop("checked", false);
        //         $box.prop("checked", true);
        //     } else {
        //         $box.prop("checked", false);
        //     }
        // });
        // let price = 0;
        // $("input:checkbox[name=value_id_4]").click(() => {
        //     //price = $(this).val();
        //     if ($(this).is(':checked')) {
        //         console.log($("input:checkbox[name=value_id_4]:checked").val());
        //     }
        //     //console.log($(this).val());
        // });
        // console.log(price);

        var uploadedDocumentMap = {};
        Dropzone.options.documentDropzone = {
            url: '{{ route('builder.storeMedia') }}',
            maxFilesize: 2, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(file, response) {
                $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
                uploadedDocumentMap[file.name] = response.name
            },
            removedfile: function(file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedDocumentMap[file.name]
                }
                $('form').find('input[name="document[]"][value="' + name + '"]').remove()
            },
            init: function() {
                @if (isset($project) && $project->document)
                    var files =
                    {!! json_encode($project->document) !!}
                    for (var i in files) {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
                    }
                @endif
            }
        }
    </script>
@endsection
