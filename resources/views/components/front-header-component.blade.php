<header>
    <div class="container">
      <nav>
        <div class="logo">
          <a href="{{route('client.home')}}"
            ><img class="card-img-top border-bottom py-2" src="{{$settings->image_logo_light != '#' ? $settings->image_logo_light : asset('admin/assets/img/elektrod_logo.svg')}}" alt="...">
        </a>
        </div>
        <ul class="nav_menu">
          <li><a href="{{route('client.about')}}">{{__('menu.about')}}</a></li>
          <li><a href="{{route('client.services')}}">{{__('menu.services')}}</a></li>
          <li><a href="{{route('client.categories')}}">{{__('menu.categories')}}</a></li>
          <li><a href="{{route('client.blogs')}}">{{__('menu.blogs')}}</a></li>
          <li><a href="{{route('client.contact')}}">{{__('menu.contact')}}</a></li>
        </ul>
        <button id="openMobNav" class="open_mobile_nav">
          <img src="./assets/images/open-nav.svg" alt="" />
        </button>
      </nav>

      <nav id="mobileNav" class="mobile_nav">
        <ul class="nav_menu">
          <li><a href="{{route('client.about')}}">{{__('menu.about')}}</a></li>
          <li><a href="{{route('client.services')}}">{{__('menu.services')}}</a></li>
          <li><a href="{{route('client.categories')}}">{{__('menu.categories')}}</a></li>
          <li><a href="{{route('client.blogs')}}">{{__('menu.blogs')}}</a></li>
          <li><a href="{{route('client.contact')}}">{{__('menu.contact')}}</a></li>
          <li>
            <ul class="social_icons">
              <li>
                <button><i class="fa-brands fa-whatsapp"></i></button>
              </li>
              <li>
                <button><i class="fa-brands fa-instagram"></i></button>
              </li>
              <li>
                <button><i class="fa-brands fa-facebook-f"></i></button>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </header>
