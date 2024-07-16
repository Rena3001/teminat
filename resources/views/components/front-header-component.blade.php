<header class="header">
    <div class="header__top--bcg">
        <div class="header__top container">
            <ul class="header__socials">
                <li>
                    <a href="{{$settings->fb}}"><i class="fa-brands fa-facebook-f"></i></a>
                </li>
                <li>
                    <a href="{{$settings->tw}}"><i class="fa-brands fa-twitter"></i></a>
                </li>
                <li>
                    <a href="{{$settings->in}}"><i class="fa-brands fa-linkedin-in"></i></a>
                </li>
                <li>
                    <a href="{{$settings->inst}}"><i class="fa-brands fa-instagram"></i></a>
                </li>
                <li>
                    <a href="{{$settings->yt}}"><i class="fa-brands fa-youtube"></i></a>
                </li>
            </ul>

            <div class="header__top--right">
                <form class="header__search">
                    <div class="header__search--input">
                        <input type="text" placeholder="{{__('search.product')}}">


                    </div>

                    <button class="header__search--btn">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
                <div class="header__lang">
                    <span>{{ Str::upper(app()->getLocale()) }}</span>
                    <i class="fa-solid fa-angle-down"></i>
                    <ul class="header__lang--menu">
                        @foreach($langs as $lang)
                                        @if (app()->getLocale() !== $lang->code)
                                        <li>
                                            <a href="{{ LaravelLocalization::getLocalizedURL($lang->code, null, [], true) }}">{{ Str::upper($lang->code) }}</a>
                                        </li>
                                        @endif
                                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="header__bottom--bcg">
        <div class="header__bottom container">
            <div class="header__logo">
                <a href="{{route('client.home')}}">
                    <img src="{{ $settings->image_logo_light }}" alt="">
                </a>
            </div>
            <nav class="navbar">
                <ul>
                    <li>
                        <a href="{{route('client.home')}}">{{__('menu.home')}}</a>
                    </li>
                    <li>
                        <a href="{{route('client.about')}}">{{__('menu.about')}}</a>
                    </li>
                    <li class="navbar__products">
                        <a href="{{route('client.categories')}}">{{__('menu.products')}}</i></a>
                    </li>
                    <li>
                        <a href="{{route('client.contact')}}">{{__('menu.contact')}}</a>
                    </li>
                </ul>
            </nav>
            <button class="icon-hamburger"></button>
        </div>
    </div>
</header>
