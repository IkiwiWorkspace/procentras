<footer class="page-footer font-small blue pt-4">
    <hr>
    <div class="container-fluid text-center text-md-left">
        <h3 class="my-h3">FotoProcentras</h3>
        <div class="row">
            <div class="col-lg-2 col-md-6 col-sm-12">
                <ul class="list-group my-list-group">
                    <li class="list-group-item">
                        <a href="https://www.google.com/maps/place/ProCentras/@54.6763108,25.2529506,17z/data=!3m1!4b1!4m5!3m4!1s0x46dd947420b0b0eb:0x8a8369a396357953!8m2!3d54.6763108!4d25.2551393"
                            target="_blank">Savanorių pr. 22</a>
                    </li>
                    <li class="list-group-item">
                        <a href="https://www.google.com/maps/place/ProCentras/@54.6763108,25.2529506,17z/data=!3m1!4b1!4m5!3m4!1s0x46dd947420b0b0eb:0x8a8369a396357953!8m2!3d54.6763108!4d25.2551393"
                            target="_blank">VILNIUS 03116</a>
                    </li>
                    <li class="list-group-item">
                        <a href="mailto:info@procentras.lt">Email: info@procentras.lt</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-6 col-sm-12">
                <ul class="list-group my-list-group">
                    <li class="list-group-item">
                        <a href="tel:852132752">Tel.: (8 5) 213 27 52</a>
                    </li>
                    <li class="list-group-item">
                        <a href="tel:852132752">Faks.: (8 5) 213 27 52</a>
                    </li>
                    <li class="list-group-item">
                        <a href="tel:865026000">Mob. tel.: 865026000</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
                <ul class="list-group my-list-group-2">
                    <li class="list-group-item">
                        <a href="#">Informacija</a>
                    </li>
                    <li class="list-group-item">
                        <a href="@if (Auth::check()) {{ route('user.contact') }} @else {{ route('contact') }} @endif">Susisiekite su mumis</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#">Apie Mus</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#">Gamybos terminai ir pristatymas</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#">Pirkimo-pardavimo taisyklės</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
                <ul class="list-group my-list-group-2">
                    <li class="list-group-item">
                        <a href="#">Mano paskyra</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#">Mano užsakymai</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#">Nustatymai</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12"><a href="https://facebook.com/procentras" target="_blank">
                    <img src="{{ asset('/storage/images/facebook-icon.png') }}" width="80px" height="72px"></a>
            </div>
        </div>
    </div>

    <div class="container text-md-left my-footer">
        <h3 class="my-h3">Partneriai</h3>
        <div class="row justify-content-md-center text-center">
            <div class="col-lg-2 col-md-12 col-sm-12">
                <a href="http://www.vilniausartele.lt" target="_blank"><img
                        src="{{ asset('/storage/images/vilniaus-artele.png') }}"></a>
            </div>
            <div class="col-lg-2 col-md-12 col-sm-12">
                <a href="https://www.efoto.lt" target="_blank"><img
                        src="{{ asset('/storage/images/e-foto.png') }}"></a>
            </div>
            <div class="col-lg-2 col-md-12 col-sm-12">
                <a href="https://www.imagine.lt/lt" target="_blank"><img
                        src="{{ asset('/storage/images/imagine.png') }}"></a>
            </div>
            <div class="col-lg-2 col-md-12 col-sm-12">
                <a href="https://www.photography.lt/lt/pradzia.html" target="_blank"><img
                        src="{{ asset('/storage/images/lietuvos-fotomenininku-sajunga.png') }}"></a>
            </div>
            <div class="col-lg-2 col-md-12 col-sm-12">
                <a href="http://sts.lt" target="_blank"><img src="{{ asset('/storage/images/sts.png') }}"></a>
            </div>
        </div>
    </div>
</footer>
