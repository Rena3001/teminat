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


     <!--                                         PRODUCTS                                 -->

    <section class="products">
        <div class="container">
            <h3>Products</h3>
            <div class="products__list">

                <!-- 10 dene product card -->

                <a href="#">
                    <div class="product_detail_card">
                      <div class="electrode_card_logo">
                        <img
                          src="https://gedik.com.tr/img/brands/geka.png"
                          alt="electrode logo"
                        />
                      </div>
                      <div class="electrode_card_img">
                        <img
                          src="https://file.gedik.com.tr/portal/approval_documents/GeKa-Elektrot-grey_60df03be2fd46.png"
                          alt="elctrode"
                        />
                      </div>
                      <div class="card_detail">
                        <p>ELECTRODE-ELIT</p>
                        <p>(E-6013)</p>
                        <button>{{ __('word.product_detail') }}</button>
                      </div>
                    </div>
                </a>


            </div>

            <a href="#" class="products__loadMore">
                {{__('word.load_more')}}
            </a>

        </div>
    </section>

    <section class="about-contact container">
        <section class="contact">
            <h3>
                <i class="fa-solid fa-paper-plane"></i>
                CONTACT US
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
                {{ $settings->home_about_desc }}
            </div>
            <a href="#" class="about__more">
                {{__('word.continue')}}
            </a>
        </section>
    </section>



</main>
@endsection
