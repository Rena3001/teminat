<!DOCTYPE html>
<html data-navigation-type="default" data-navbar-horizontal-shape="default" lang="en-US" dir="ltr">

<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.layout.includes.head')
    <title>
        EAP - @stack('page_title','Elektrod Admin Panel')
    </title>

    @stack('css')

    <link href="{{ asset('admin/assets/css/theme.min.css') }}" type="text/css" rel="stylesheet" id="style-default">
    <link href="{{ asset('admin/assets/css/user.min.css') }}" type="text/css" rel="stylesheet" id="user-style-default">

    <link href="{{ asset('admin/assets/css/custom.css') }}" type="text/css" rel="stylesheet" id="user-style-default">
</head>

<body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        @include('admin.layout.includes.sidebar')
        <x-admin-header-component />

        <div class="content me-0">

            <h2 class="mb-2 lh-sm">
                @stack('section_title')
            </h2>
            @yield('content')
            @if (session('message'))
            <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
                <div class="text-{{session('type')}} border-{{session('type')}} bg-{{session('type')}}-subtle toast hide"
                    id="liveToast" role="alert" aria-live="assertive" aria-atomic="true" autoclick>
                    <div class="toast-header text-{{session('type')}} border-{{session('type')}}">
                        <strong class="me-auto">{{session('type')=='success'?'Uğurlu əməliyyat':'Xəta'}}</strong>
                        <button class="btn ms-2 p-0" type="button" data-bs-dismiss="toast" aria-label="Close"><span
                                data-feather="x"></span></button>
                    </div>
                    <div class="toast-body">{{session('message')}}</div>
                </div>
            </div>
            @endif
            <x-admin-footer-component />

        </div>
        <!-- <div class="modal fade" id="searchBoxModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="true"
            data-phoenix-modal="data-phoenix-modal" style="--phoenix-backdrop-opacity: 1;">
            <div class="modal-dialog">
                <div class="modal-content mt-15 rounded-pill">
                    <div class="modal-body p-0">
                        <div class="search-box navbar-top-search-box" data-list='{"valueNames":["title"]}'
                            style="width: auto;">
                            <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                                <input class="form-control search-input fuzzy-search rounded-pill form-control-lg"
                                    type="search" placeholder="Search..." aria-label="Search">
                                <span class="fas fa-search search-box-icon"></span>
                            </form>
                            <div class="btn-close position-absolute end-0 top-50 translate-middle cursor-pointer shadow-none"
                                data-bs-dismiss="search"><button class="btn btn-link p-0" aria-label="Close"></button>
                            </div>
                            <div class="dropdown-menu border start-0 py-0 overflow-hidden w-100">
                                <div class="scrollbar-overlay" style="max-height: 30rem;">
                                    <div class="list pb-3">
                                        <h6 class="dropdown-header text-body-highlight fs-10 py-2">24 <span
                                                class="text-body-quaternary">results</span></h6>
                                        <hr class="my-0">
                                        <h6
                                            class="dropdown-header text-body-highlight fs-9 border-bottom border-translucent py-2 lh-sm">
                                            Recently Searched </h6>
                                        <div class="py-2"><a class="dropdown-item"
                                                href="apps/e-commerce/landing/product-details.html">
                                                <div class="d-flex align-items-center">
                                                    <div class="fw-normal text-body-highlight title"><span
                                                            class="fa-solid fa-clock-rotate-left"
                                                            data-fa-transform="shrink-2"></span> Store Macbook</div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item"
                                                href="apps/e-commerce/landing/product-details.html">
                                                <div class="d-flex align-items-center">
                                                    <div class="fw-normal text-body-highlight title"> <span
                                                            class="fa-solid fa-clock-rotate-left"
                                                            data-fa-transform="shrink-2"></span> MacBook Air - 13″
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <hr class="my-0">
                                        <h6
                                            class="dropdown-header text-body-highlight fs-9 border-bottom border-translucent py-2 lh-sm">
                                            Products</h6>
                                        <div class="py-2"><a class="dropdown-item py-2 d-flex align-items-center"
                                                href="apps/e-commerce/landing/product-details.html">
                                                <div class="file-thumbnail me-2"><img
                                                        class="h-100 w-100 fit-cover rounded-3"
                                                        src="{{asset('admin/assets/img/products/60x60/3.png')}}" alt="">
                                                </div>
                                                <div class="flex-1">
                                                    <h6 class="mb-0 text-body-highlight title">MacBook Air - 13″</h6>
                                                    <p class="fs-10 mb-0 d-flex text-body-tertiary"><span
                                                            class="fw-medium text-body-tertiary text-opactity-85">8GB
                                                            Memory - 1.6GHz - 128GB Storage</span></p>
                                                </div>
                                            </a>
                                            <a class="dropdown-item py-2 d-flex align-items-center"
                                                href="apps/e-commerce/landing/product-details.html">
                                                <div class="file-thumbnail me-2"><img class="img-fluid"
                                                        src="{{asset('admin/assets/img/products/60x60/3.png')}}" alt="">
                                                </div>
                                                <div class="flex-1">
                                                    <h6 class="mb-0 text-body-highlight title">MacBook Pro - 13″</h6>
                                                    <p class="fs-10 mb-0 d-flex text-body-tertiary"><span
                                                            class="fw-medium text-body-tertiary text-opactity-85 ms-2">30
                                                            Sep at 12:30 PM</span></p>
                                                </div>
                                            </a>
                                        </div>
                                        <hr class="my-0">
                                        <h6
                                            class="dropdown-header text-body-highlight fs-9 border-bottom border-translucent py-2 lh-sm">
                                            Quick Links</h6>
                                        <div class="py-2"><a class="dropdown-item"
                                                href="apps/e-commerce/landing/product-details.html">
                                                <div class="d-flex align-items-center">
                                                    <div class="fw-normal text-body-highlight title"><span
                                                            class="fa-solid fa-link text-body"
                                                            data-fa-transform="shrink-2"></span> Support MacBook
                                                        House</div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item"
                                                href="apps/e-commerce/landing/product-details.html">
                                                <div class="d-flex align-items-center">
                                                    <div class="fw-normal text-body-highlight title"> <span
                                                            class="fa-solid fa-link text-body"
                                                            data-fa-transform="shrink-2"></span> Store MacBook″</div>
                                                </div>
                                            </a>
                                        </div>
                                        <hr class="my-0">
                                        <h6
                                            class="dropdown-header text-body-highlight fs-9 border-bottom border-translucent py-2 lh-sm">
                                            Files</h6>
                                        <div class="py-2"><a class="dropdown-item"
                                                href="apps/e-commerce/landing/product-details.html">
                                                <div class="d-flex align-items-center">
                                                    <div class="fw-normal text-body-highlight title"><span
                                                            class="fa-solid fa-file-zipper text-body"
                                                            data-fa-transform="shrink-2"></span> Library MacBook
                                                        folder.rar</div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item"
                                                href="apps/e-commerce/landing/product-details.html">
                                                <div class="d-flex align-items-center">
                                                    <div class="fw-normal text-body-highlight title"> <span
                                                            class="fa-solid fa-file-lines text-body"
                                                            data-fa-transform="shrink-2"></span> Feature MacBook
                                                        extensions.txt</div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item"
                                                href="apps/e-commerce/landing/product-details.html">
                                                <div class="d-flex align-items-center">
                                                    <div class="fw-normal text-body-highlight title"> <span
                                                            class="fa-solid fa-image text-body"
                                                            data-fa-transform="shrink-2"></span> MacBook Pro_13.jpg
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <hr class="my-0">
                                        <h6
                                            class="dropdown-header text-body-highlight fs-9 border-bottom border-translucent py-2 lh-sm">
                                            Members</h6>
                                        <div class="py-2"><a class="dropdown-item py-2 d-flex align-items-center"
                                                href="pages/members.html">
                                                <div class="avatar avatar-l status-online  me-2 text-body">
                                                    <img class="rounded-circle "
                                                        src="{{asset('admin/assets/img/team/40x40/10.webp')}}" alt="">
                                                </div>
                                                <div class="flex-1">
                                                    <h6 class="mb-0 text-body-highlight title">Carry Anna</h6>
                                                    <p class="fs-10 mb-0 d-flex text-body-tertiary">anna@technext.it
                                                    </p>
                                                </div>
                                            </a>
                                            <a class="dropdown-item py-2 d-flex align-items-center"
                                                href="pages/members.html">
                                                <div class="avatar avatar-l  me-2 text-body">
                                                    <img class="rounded-circle "
                                                        src="{{asset('admin/assets/img/team/40x40/12.webp')}}" alt="">
                                                </div>
                                                <div class="flex-1">
                                                    <h6 class="mb-0 text-body-highlight title">John Smith</h6>
                                                    <p class="fs-10 mb-0 d-flex text-body-tertiary">smith@technext.it
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                        <hr class="my-0">
                                        <h6
                                            class="dropdown-header text-body-highlight fs-9 border-bottom border-translucent py-2 lh-sm">
                                            Related Searches</h6>
                                        <div class="py-2"><a class="dropdown-item"
                                                href="apps/e-commerce/landing/product-details.html">
                                                <div class="d-flex align-items-center">
                                                    <div class="fw-normal text-body-highlight title"><span
                                                            class="fa-brands fa-firefox-browser text-body"
                                                            data-fa-transform="shrink-2"></span> Search in the Web
                                                        MacBook</div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item"
                                                href="apps/e-commerce/landing/product-details.html">
                                                <div class="d-flex align-items-center">
                                                    <div class="fw-normal text-body-highlight title"> <span
                                                            class="fa-brands fa-chrome text-body"
                                                            data-fa-transform="shrink-2"></span> Store MacBook″</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <p class="fallback fw-bold fs-7 d-none">No Result Found.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->

    @include('admin.layout.includes.foot')
    <script>
        function getCsrfToken() {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        }

        // Check if it's the user's first visit by checking sessionStorage
        if (!sessionStorage.getItem('timezoneSet')) {
            document.addEventListener("DOMContentLoaded", function() {
                var timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
                fetch('/set-timezone', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': getCsrfToken()
                    },
                    body: JSON.stringify({ timezone: timezone })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'Timezone set') {
                        // Mark that the timezone has been set
                        sessionStorage.setItem('timezoneSet', 'true');
                    }
                });
            });
        }
    </script>
    @stack('js')

    <script src="{{asset('admin/assets/js/custom.js')}}"></script>
    @stack('scripts')
</body>

</html>
