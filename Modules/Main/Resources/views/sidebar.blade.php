<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">AdminKit</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-item  {{ set_active('dashboard') }}">
                <a class="sidebar-link  " href="/dashboard">
                    <i class="align-middle " data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            {{-- <li class="sidebar-header">
                Master Data
            </li> --}}

            <li class="sidebar-item {{ set_active('pendidikan') }} {{ set_active('kategorilowongan') }}">
                <a data-bs-target="#masters" data-bs-toggle="collapse" class="sidebar-link collapsed  ">
                    <i class="align-middle " data-feather="layers"></i> <span class="align-middle">Master Data</span>
                </a>
                <ul id="masters"
                    class="sidebar-dropdown list-unstyled collapse {{ set_show('pendidikan') }} {{ set_show('kategorilowongan') }}"
                    data-bs-parent="#sidebar">
                    <li class="sidebar-item {{ set_active('pendidikan') }}"><a class="sidebar-link"
                            href="pendidikan">Pendidikan</a></li>
                    <li class="sidebar-item {{ set_active('kategorilowongan') }}"><a class="sidebar-link"
                            href="kategorilowongan">Kategori Lowongan</a></li>
                </ul>
            </li>


        </ul>

        {{-- <div class="sidebar-cta">
            <div class="sidebar-cta-content">
                <strong class="d-inline-block mb-2">Upgrade to Pro</strong>
                <div class="mb-3 text-sm">
                    Are you looking for more components? Check out our premium version.
                </div>
                <div class="d-grid">
                    <a href="upgrade-to-pro.html" class="btn btn-primary">Upgrade to Pro</a>
                </div>
            </div>
        </div> --}}
    </div>
</nav>
