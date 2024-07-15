<header class="header">
    <div class="header__top--bcg">
        <div class="header__top container">
            <ul class="header__socials">
                <li>
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                </li>
            </ul>

            <div class="header__top--right">
                <form class="header__search">
                    <div class="header__search--input">
                        <input type="text" placeholder="{{__('site.search_product')}}">


                    </div>

                    <button class="header__search--btn">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
                <div class="header__lang">
                    <span>EN</span>
                    <i class="fa-solid fa-angle-down"></i>
                    <ul class="header__lang--menu">
                        <li>
                            <a href="#">AZ</a>
                        </li>
                        <li>
                            <a href="#">EN</a>
                        </li>
                        <li>
                            <a href="#">RU</a>
                        </li>
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
                        <a href="{{route('client.home')}}">{{__('site.home')}}</a>
                    </li>
                    <li>
                        <a href="{{route('client.about')}}">{{__('site.about')}}</a>
                    </li>
                    <li class="navbar__products">
                        <a href="{{route('client.wires_and_fluxes')}}">{{__('site.products')}}</i></a>
                    </li>
                    <li>
                        <a href="{{route('client.contact')}}">{{__('site.contact')}}</a>
                    </li>
                </ul>
            </nav>
            <button class="icon-hamburger"></button>
        </div>
    </div>
</header>
