@extends('client.layout.master')
@section('page_title', "Elektrod")
@push('js')

@endpush
@section('content')
<main class="main">

    <div class="swiper bannerSwiper" id="homeBanner">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="https://file.gedik.com.tr/web/slider/welding_2.jpg" alt="">
            </div>
            <div class="swiper-slide">
                <img src="https://file.gedik.com.tr/web/slider/valve_2.jpg" alt="">
            </div>
            <div class="swiper-slide">
                <img src="https://file.gedik.com.tr/web/slider/casting_2.jpg" alt="">
            </div>
            <div class="swiper-slide">
                <img src="https://file.gedik.com.tr/web/slider/gev_2.jpg" alt="">
            </div>
        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
    <section class="navBox">
        <ul>
            @foreach ($categories as $category)
            <li class="navBox__card" style="background-image: url({{$category->image}});">
                <a href="{{route('client.categories')}}">
                    {{$category->title}}
                </a>
            </li>
            @endforeach
        </ul>
    </section>

     <!--                                         PRODUCTS                                 -->

    <section class="products">
        <div class="container">
            <h3>{{__('menu.products')}}</h3>
            <div class="products__list">

                @foreach ($products as $product)

                <a href="{{route('client.product.detail',$product->id)}}">
                    <div class="product_detail_card">
                      <div class="electrode_card_logo">
                        <img
                          src="{{$product->brand->image}}"
                          alt="{{$product->brand->title}}"
                        />
                      </div>
                      <div class="electrode_card_img">
                        <img
                          src="{{$product->image}}"
                          alt="{{$product->title}}"
                        />
                      </div>
                      <div class="card_detail">
                        <p>{{$product->title}}</p>
                        @if ($product->model?->title)
                        <p>({{$product->model?->title}})</p>
                        @endif
                        <button>{{ __('word.product_detail') }}</button>
                      </div>
                    </div>
                </a>
                @endforeach
            </div>

            <a href="{{route('client.products')}}" class="products__loadMore">
                {{__('word.all_products')}}
            </a>

        </div>
    </section>

    <section class="about-contact container">
        <section class="contact">
            <h3>
                <i class="fa-solid fa-paper-plane"></i>
                {{strtoupper(__('word.contact_us'))}}
            </h3>
            <form class="contactForm">
                <label>
                    {{ __('word.name') }}, {{ __('word.surname') }}
                    <input name="fullname" type="text">
                </label>

                <label>
                    {{ __('word.email') }}
                    <input name="email" type="text">
                </label>

                <label>
                    {{ __('word.phone_number') }}
                    <input name="phone" type="text">
                </label>

                <label>
                    {{ __('word.your_message') }}
                    <div class="textarea">
                        <textarea name="message"></textarea>
                    </div>
                </label>
                <button>{{__('word.send')}}</button>
            </form>
        </section>

        <section class="about">
            <h2>
                {{ $settings->home_about_title }}
            </h2>
            <div>
                {!! $settings->home_about_desc !!}
            </div>
            <a href="{{route('client.about')}}" class="about__more">
                {{__('word.continue')}}
            </a>
        </section>
    </section>



</main>
@endsection
