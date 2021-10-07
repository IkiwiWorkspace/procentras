@extends('layouts.master')

@section('content')


    <section class="section-1">
        <img src="{{ asset('/storage/images/pro-centras-section-1.png') }}">
    </section>

    <section class="section-contact-2">
        <div class="container">
            <h2 class="my-h2 text-center text-uppercase">Kontaktai</h2>
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-sm-12 my-col">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2306.8930478320644!2d25.25295061585848!3d54.67631078027919!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dd947420b0b0eb%3A0x8a8369a396357953!2sProCentras!5e0!3m2!1slt!2slt!4v1625419748283!5m2!1slt!2slt"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 my-col">
                    <form class="my-form">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" placeholder="Vardas">
                        </div>
                        <div class="form-group">
                            <input type="tel" class="form-control" id="phone" placeholder="Telefono nr.">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" placeholder="El. paštas">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="message" rows="3" placeholder="Pranešimas"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Siųsti</button>


                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="section-contact">
        <div class="container">
            <div class="row row-contact align-items-center justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-12 align-items-center d-flex justify-content-center">
                    <div class="d-flex px-3">
                        <div>
                            <div class="icon icon-sm icon-secondary">
                                <i class="fas fa-phone" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="pl-4 my-icon">
                            <h5>Telefono nr.</h5>
                            <p>(8 5) 213 27 52</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center">
                    <div class="d-flex px-3">
                        <div>
                            <div class="icon icon-sm icon-secondary">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>
                        <div class="pl-4 my-icon">
                            <h5>El. paštas</h5>
                            <p>info@procentras.lt</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center">
                    <div class="d-flex px-3">
                        <div>
                            <div class="icon icon-sm icon-secondary">
                                <i class="fas fa-location-arrow"></i>
                            </div>
                        </div>
                        <div class="pl-4 my-icon">
                            <h5>Adresas</h5>
                            <p>(8 5) 213 27 52</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
