<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
        <h2>Procentras</h2>
    </div>
    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.dashboard') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
                </svg> Dashboard</a></li>
        <li class="c-sidebar-nav-title">Redaguoti</li>
        <li class="c-sidebar-nav-dropdown"><a class="c-sidebar-nav-dropdown-toggle" href="#">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-truck') }}"></use>
                </svg> Produktai </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"
                        href="{{ route('admin.create.product') }}"> Pridėti naują</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.get.product') }}">
                        Visi produktai</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"
                        href="{{ route('admin.get.variations') }}">
                        Variacijos</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"
                        href="{{ route('admin.get.variations.edit') }}">
                        Variacijų tvarkymas</a></li>
            </ul>
        </li>
        <li class="c-sidebar-nav-dropdown"><a class="c-sidebar-nav-dropdown-toggle" href="#">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-lan') }}"></use>
                </svg> Kategorijos </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"
                        href="{{ route('admin.category.create') }}"> Pridėti naują</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"
                        href="{{ route('admin.get.categories') }}"> Visos kategorijos</a></li>
            </ul>
        </li>
        <li class="c-sidebar-nav-dropdown"><a class="c-sidebar-nav-dropdown-toggle" href="#">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-user-female') }}"></use>
                </svg> Vartotojai </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.user.create') }}">
                        Pridėti naują</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.users') }}"> Visi
                        vartotojai</a></li>
            </ul>
        </li>
    </ul>
</div>
