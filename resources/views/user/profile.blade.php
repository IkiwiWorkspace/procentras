@extends('layouts.master')

@section('content')
    <section class="section-1">
        <img src="{{ asset('/storage/images/pro-centras-section-1.png') }}">
    </section>

    <section class="section-contact-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <div class="container">
                        <ul class="nav nav-tabs flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#pradzia">Pradžia</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" role="tab" data-toggle="tab" href="#uzsakymai">Užsakymai</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" role="tab" data-toggle="tab" href="#nustatymai">Nustatymai</a>
                            </li>
                            </li>
                        </ul>

                    </div>
                </div>
                <div class="col-lg-9 col-md-12 my-tab">
                    <div class="tab-content">
                        <div class="tab-pane container active" role="tabpanel" id="pradzia">
                            <p>Sveiki atykę. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem corrupti nobis
                                animi, repudiandae suscipit voluptatum beatae voluptas expedita quos excepturi nisi nulla
                                delectus impedit et? Laborum in suscipit incidunt itaque?</p>
                        </div>
                        <div class="tab-pane container fade" role="tabpanel" id="uzsakymai">
                            <p>Užsakymų šiuo metu nėra</p>
                        </div>
                        <div class="tab-pane container fade" id="nustatymai">
                            <div class="form-group">
                                <label for="password">Pakeisti slaptažodį</label>
                                <input type="password" class="form-control" id="new-password"
                                    placeholder="Naujas slaptažodis ">
                                <button type="submit" class="btn btn-primary my-btn-form">Pakeisti</button>
                            </div>
                            <div class="form-group">
                                <label for="phone">Pakeisti telefono nr.</label>
                                <input type="tel" class="form-control" id="new-phone" placeholder="Naujas telefono nr. ">
                                <button type="submit" class="btn btn-primary my-btn-form">Pakeisti</button>
                            </div>
                            <div class="form-group address">
                                <label for="address">Pakeisti adresą</label>
                                <input type="text" class="form-control" id="new-address" placeholder="Apskritis">
                                <input type="text" class="form-control" id="new-address" placeholder="Miestas">
                                <input type="text" class="form-control" id="new-address" placeholder="Gatvė">
                                <input type="text" class="form-control" id="new-address" placeholder="Namo/buto nr.">
                                <button type="submit" class="btn btn-primary">Pakeisti</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
