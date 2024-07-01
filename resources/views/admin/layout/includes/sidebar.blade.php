<nav class="navbar navbar-vertical navbar-expand-lg" style="display:block;">
    <script>
    var navbarStyle = window.config.config.phoenixNavbarStyle;
    if (navbarStyle && navbarStyle !== 'transparent') {
        document.querySelector('body').classList.add(`navbar-${navbarStyle}`);
    }
    </script>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content">
            <ul class="navbar-nav flex-column" id="navbarVerticalNav">
                <li class="nav-item">
                </li>
                <li class="nav-item">
                    <div class="nav-item-wrapper"><a
                            class="nav-link label-1 @if (Route::is('admin.dashboard*')) active @endif"
                            href="{{ route('admin.dashboard') }}" role="button" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                        data-feather="pie-chart"></span></span><span class="nav-link-text-wrapper"><span
                                        class="nav-link-text">İdarə Paneli</span></span></div>
                        </a>
                    </div>
                    <div class="nav-item-wrapper">
                        <a class="nav-link dropdown-indicator label-1 @if (!Route::is('admin.language_line*', 'admin.langs*', 'admin.sliders*')) collapsed @else active @endif"
                            href="#nv-home " role="button" data-bs-toggle="collapse"
                            aria-expanded="{{Route::is('admin.language_line*' , 'admin.langs*', 'admin.sliders*')?'true':'false'}}"
                            aria-controls="nv-home">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span>
                                </div><span class="nav-link-icon"><span data-feather="columns"></span></span><span
                                    class="nav-link-text">Cədvəllər</span>
                            </div>
                        </a>
                        <div class="parent-wrapper label-1">
                            <ul class="nav collapse parent @if (Route::is('admin.language_line*' , 'admin.langs*', 'admin.sliders*')) show @endif"
                                data-bs-parent="#navbarVerticalCollapse" id="nv-home">
                                <li class="nav-item">
                                    <a class="nav-link dropdown-indicator label-1 @if (Route::is('admin.language_line*')) active @endif"
                                        href="{{ route('admin.language_line.index') }}">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-icon me-0"><span data-feather="clipboard"></span>
                                            </span>
                                            <span class="nav-link-text ps-2">Statik tərcümələr</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link dropdown-indicator label-1 @if (Route::is('admin.langs*')) active @endif"
                                        href="{{ route('admin.langs.index') }}">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-icon me-0"><span data-feather="flag"></span>
                                            </span>
                                            <span class="nav-link-text ps-2">Dillər</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link dropdown-indicator label-1 @if (Route::is('admin.valve_categories*')) active @endif"
                                        href="{{ route('admin.valve_categories.index') }}">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-icon me-0"><span data-feather="folder"></span>
                                            </span>
                                            <span class="nav-link-text ps-2">Valve Kategoriyalar</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link dropdown-indicator label-1 @if (Route::is('admin.sliders*')) active @endif"
                                        href="{{ route('admin.sliders.index') }}">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-icon me-0"><span data-feather="sliders"></span>
                                            </span>
                                            <span class="nav-link-text ps-2">Slaydlar</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link dropdown-indicator label-1 @if (Route::is('admin.brands*')) active @endif"
                                        href="{{ route('admin.brands.index') }}">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-icon me-0"><span data-feather="bold"></span>
                                            </span>
                                            <span class="nav-link-text ps-2">Brendlər</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link dropdown-indicator label-1 @if (Route::is('admin.products*')) active @endif"
                                        href="{{ route('admin.products.index') }}">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-icon me-0"><span data-feather="target"></span>
                                            </span>
                                            <span class="nav-link-text ps-2">Məhsullar</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link dropdown-indicator label-1 @if (Route::is('admin.welding_categories*')) active @endif"
                                        href="{{ route('admin.welding_categories.index') }}">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-icon me-0"><span data-feather="folder"></span>
                                            </span>
                                            <span class="nav-link-text ps-2">Welding Kateqorilər</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link dropdown-indicator label-1 @if (Route::is('admin.welding_groups*')) active @endif"
                                        href="{{ route('admin.welding_groups.index') }}">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-icon me-0">
                                                <span data-feather="hexagon"></span>
                                            </span>
                                            <span class="nav-link-text ps-2">
                                                Welding Qrupları
                                            </span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 @if (Route::is('admin.contacts*')) active @endif"
                            href="{{ route('admin.contacts.index') }}" role="button" data-bs-toggle=""
                            aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon">
                                    <span data-feather="phone"></span>
                                </span>
                                <span class="nav-link-text-wrapper">
                                    <span class="nav-link-text">
                                        Müştərilərin Məlumatları
                                    </span>
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 @if (Route::is('admin.settings*')) active @endif"
                            href="{{ route('admin.settings') }}" role="button" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon">
                                    <span data-feather="settings"></span>
                                </span>
                                <span class="nav-link-text-wrapper">
                                    <span class="nav-link-text">
                                        Saytın Ümumi Parametrləri
                                    </span>
                                </span>
                            </div>
                        </a>
                    </div>
                </li>
</nav>