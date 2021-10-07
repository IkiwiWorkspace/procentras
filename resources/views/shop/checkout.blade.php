@extends('layouts.master')

@section('content')
    <!--Section: Block Content-->
    <section class="shopping-cart dark">
        <!--Grid row-->
        <div class="block-heading">
            <h2>Apmokėjimas</h2>
        </div>
        <div class="container">
            <div class="row">
                <!--Grid column-->
                <div class="col-lg-8 mb-4 card">
                    <!-- Card -->
                    <form class="py-4">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">Vardas</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputPassword1">Pavardė</label>
                                <input type="text" class="form-control" id="exampleInputPassword1">
                            </div>
                        </div>
                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Šalis</label>
                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                            <option selected>Pasirinkite...</option>
                            <option value="1">Lietuva</option>
                            <option value="2">Latvija</option>
                            <option value="3">Estija</option>
                        </select>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">Gatvė, namo numeris</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputPassword1">Butas, blokas</label>
                                <input type="text" class="form-control" id="exampleInputPassword1">
                            </div>
                        </div>
                        <label for="exampleInputPassword1">Miestas</label>
                        <input type="text" class="form-control" id="exampleInputPassword1">
                        <label for="exampleInputPassword1">Apskritis</label>
                        <input type="text" class="form-control" id="exampleInputPassword1">
                        <label for="exampleInputPassword1">Pašto kodas</label>
                        <input type="text" class="form-control" id="exampleInputPassword1">
                        <label for="exampleInputPassword1">Telefonas</label>
                        <input type="text" class="form-control" id="exampleInputPassword1">
                        <label for="exampleInputPassword1">El. paštas</label>
                        <input type="text" class="form-control" id="exampleInputPassword1">
                        <label for="exampleFormControlTextarea1">Pastabos</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </form>
                    <!-- Card -->
                </div>
                <!--Grid column-->
                <!--Grid column-->
                <div class="col-lg-4">
                    <!-- Card -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-3">Krepšelis</h5>
                            <ul class="list-group list-group-flush">
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    Suma
                                    <span>$ {{ $totalPrice }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    Pristatymas
                                    <span>Atsiemimas vietoje</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                    <div>
                                        <strong>Viso suma</strong>
                                        <strong>
                                            <p class="mb-0">(su PVM)</p>
                                        </strong>
                                    </div>
                                    <span><strong>$ {{ $totalPrice }}</strong></span>
                                </li>
                            </ul>
                            <button type="button"
                                class="btn btn-primary btn-block waves-effect waves-light">Apmokėti</button>
                        </div>
                    </div>
                    <!-- Card -->

                    <!-- Card -->
                    {{-- <div class="card mb-4">
                    <div class="card-body">
                        <a class="dark-grey-text d-flex justify-content-between" data-toggle="collapse"
                            href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Add a discount code (optional)
                            <span><i class="fas fa-chevron-down pt-1"></i></span>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <div class="mt-3">
                                <div class="md-form md-outline mb-0">
                                    <input type="text" id="discount-code" class="form-control font-weight-light"
                                        placeholder="Enter discount code">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                    <!-- Card -->
                </div>
                <!--Grid column-->
            </div>

        </div>
        <!--Grid row-->
    </section>
    <!--Section: Block Content-->
@endsection
