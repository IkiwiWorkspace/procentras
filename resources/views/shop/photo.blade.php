@extends('layouts.master')

@section('content')
    <section class="section-contact-2 form">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-12">
                    @foreach ($variations as $variation)
                        @if ($variation->name == 'Tradicinio formato nuotraukų dydžiai')
                            <h4>{{ $variation->name }}</h4>
                            @foreach ($variation->values()->get() as $value)
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input cb" type="checkbox" value="{{ $value->price }}"
                                        id="customCheck-{{ $value->id }}" name="{{ $variation->id }}">

                                    <label class="custom-control-label"
                                        for="customCheck-{{ $value->id }}">{{ $value->name }}
                                    </label>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <script>
                        var valuetwo = 0;
                    </script>
                    @foreach ($variations as $variation)
                        @if ($variation->name != 'Tradicinio formato nuotraukų dydžiai')
                            <div class="foto-option mb-4">
                                <h4>{{ $variation->name }}</h4>
                                @foreach ($variation->values()->get() as $value)

                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input class="custom-control-input cb2" type="checkbox"
                                            value="{{ $value->price }}" id="customCheck-{{ $value->id }}"
                                            name="{{ $variation->id }}" data-valuetwo="{{ $variation->id }}" />
                                        <label class="custom-control-label"
                                            for="customCheck-{{ $value->id }}">{{ $value->name }}
                                        </label>

                                    </div>

                                @endforeach
                            </div>
                        @endif
                    @endforeach
                </div>

                <div class="col-lg-6 col-md-12 my-tab">
                    <div style="align-items: center">
                        <div class="card-body">
                            <form action="{{ route('builder.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="needsclick dropzone" id="document-dropzone">

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

                <div class="col-lg-3 col-md-12 foto-description">
                    <div class="foto-info  p-3">
                        <h5>Informacija</h5>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis, nesciunt? Accusantium rem
                        aliquam, nesciunt praesentium dolore expedita quas totam corporis nulla id? In quibusdam,
                        inventore
                        recusandae culpa expedita magni accusantium!
                    </div>
                    <div class="foto-order p-3">
                        <h5>Kaina:<input type="text" name="total" value="" size="30" id="total" class="custom-price-input" disabled="disabled">
                        </h5>
                        <button class="btn btn-primary">Užsakyti</button>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@section('scripts')
    <script type="text/javascript">
        // let data = {!! json_encode($variations, JSON_HEX_TAG) !!};

        // data.forEach(function(data) {
        //     console.log(Object.values(data));
        // });

        // let result = data.filter(obj => {
        // return obj.id === 1;
        // })        
        // console.log(data[Object.keys(data)[0]]);

        // var urls = []
        // data.id.forEach(function(e) {
        //     urls.push(e.alt_sizes[0]['url']);
        // });
        // console.log(urls);





        $('input:checkbox.cb').click(function() {
            if ($(this).prop("checked") == true) {
                $('.cb').removeClass('check-selected');
                $('.cb').addClass('check-unselected');
                $(this).addClass('check-selected');

            }
        });

        $('input:checkbox.cb').click(function() {
            if ($(this).prop("checked") == true) {
                $('.cb').removeClass('check-selected');
                $('.cb').addClass('check-unselected');
                $(this).addClass('check-selected');
                $('.cb').prop("checked", false);
                $(this).prop("checked", true);
            }
        });

       

        $('.cb2').each(function() {
            //console.log($(this).attr('data-valuetwo'));
            //let id = $((this).attr('data-valuetwo'));
            var id = $(this).attr("data-valuetwo");
            console.log(id);
            $('input:checkbox.cb2').click(function() {
                 if (!$(this).hasClass(id)) {
                    $(this).addClass(id);
                 }
                 else {
                    $(this).removeClass(id);
                 }

                //  if ($(this).prop("checked") == true) {
                // $('.cb2').addClass('check-selected');
                // $('.cb2').removeClass('check-unselected');
                // $(this).addClass('check-selected');
                // $('.cb2').prop("checked", true);
            //}
            });

            // $('input:checkbox.cb2').click(function() {
            // if ($(this).prop("checked") == false) {
            //     $('.cb2').removeClass('check-selected');
            //     $('.cb2').addClass('check-unselected');
            //     $(this).addClass('check-selected');
            //     $('.cb2').prop("checked", false);
         //   }
        //});
        });

        


        $('input:checkbox').change(function() {
            var total = 0;
            $('input:checkbox:checked').each(function() {
                total += isNaN(parseInt($(this).val())) ? 0 : parseInt($(this).val());
            });
            $("#total").val(total);

        });
    </script>

    <script>
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
