@extends('client.layout.master')
@section('page_title', 'Təminat')
@push('js')
@endpush
@section('content')

    <main>
        <section class="presentation">
            <div class="container">
                <div class="presentation_block">
                    <div class="presentation_about">
                        <h1>{{ __('home.title') }}</h1>
                        <div class="presentation_text">
                            <p class="presentation_web_p">
                                {!! $settings->home_about_desc !!}
                            </p>
                            <p class="presentation_mob_p">
                                {{ __('word.delivery') }}
                            </p>
                        </div>
                        <div class="presentation_btns">
                            <a href="#">{{ __('word.detail') }}</a>
                            <a href="{{ route('client.contact') }}"><i
                                    class="fa-solid fa-chevron-right"></i><span>{{ __('menu.contact') }}</span></a>
                        </div>
                    </div>
                    <div class="presentation_collage">
                        <div class="presentation_img">

                            <img class="card-img-top border-bottom py-2"
                                src="{{ $settings->home_banner != '#' ? $settings->home_banner : asset('client/assets/images/presentation1.jpg') }}"
                                alt="Ana Səhifəsinin Banner Şəkli"
                                onerror="this.onerror=null; this.src='{{ asset('client/assets/images/presentation1.jpg') }}';">
                            <img class="card-img-top border-bottom py-2"
                                src="{{ $settings->home_banner2 != '#' ? $settings->home_banner2 : asset('client/assets/images/presentation2.jpg') }}"
                                alt="Ana Səhifəsinin Banner Şəkli"
                                onerror="this.onerror=null; this.src='{{ asset('client/assets/images/presentation2.jpg') }}';">
                        </div>
                        <div class="presentation_img">

                            <img class="card-img-top border-bottom py-2"
                                src="{{ $settings->home_banner2 != '#' ? $settings->home_banner2 : asset('client/assets/images/presentation2.jpg') }}"
                                alt="Ana Səhifəsinin Banner Şəkli"
                                onerror="this.onerror=null; this.src='{{ asset('client/assets/images/presentation2.jpg') }}';">
                            <img class="card-img-top border-bottom py-2"
                                src="{{ $settings->home_banner3 != '#' ? $settings->home_banner3 : asset('client/assets/images/presentation3.jpg') }}"
                                alt="Ana Səhifəsinin Banner Şəkli"
                                onerror="this.onerror=null; this.src='{{ asset('client/assets/images/presentation3.jpg') }}';">
                        </div>
                        <div class="presentation_img">

                            <img class="card-img-top border-bottom py-2"
                                src="{{ $settings->home_banner3 != '#' ? $settings->home_banner3 : asset('client/assets/images/presentation3.jpg') }}"
                                alt="Ana Səhifəsinin Banner Şəkli"
                                onerror="this.onerror=null; this.src='{{ asset('client/assets/images/presentation3.jpg') }}';">
                            <img class="card-img-top border-bottom py-2"
                                src="{{ $settings->home_banner4 != '#' ? $settings->home_banner4 : asset('client/assets/images/presentation4.jpg') }}"
                                alt="Ana Səhifəsinin Banner Şəkli"
                                onerror="this.onerror=null; this.src='{{ asset('client/assets/images/presentation4.jpg') }}';">
                        </div>
                        <div class="presentation_img last">

                            <img class="card-img-top border-bottom py-2"
                                src="{{ $settings->home_banner4 != '#' ? $settings->home_banner4 : asset('client/assets/images/presentation4.jpg') }}"
                                alt="Ana Səhifəsinin Banner Şəkli"
                                onerror="this.onerror=null; this.src='{{ asset('client/assets/images/presentation4.jpg') }}';">
                            <img class="card-img-top border-bottom py-2"
                                src="{{ $settings->home_banner5 != '#' ? $settings->home_banner5 : asset('client/assets/images/presentation5.jpg') }}"
                                alt="Ana Səhifəsinin Banner Şəkli"
                                onerror="this.onerror=null; this.src='{{ asset('client/assets/images/presentation5.jpg') }}';">

                        </div>
                    </div>

                    <div class="presentation_btn">
                        <a href="#">{{ __('word.detail') }}</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="services">
            <div class="container">
                <div class="services_block">
                    <div class="services_item">
                        <div class="services_img">
                            <img class="card-img-top border-bottom py-2"
                                src="{{ asset('client/assets/images/services.png') }}" alt="...">
                        </div>
                        <h2>{{ __('menu.services') }}</h2>
                        <ul>
                            @foreach ($models as $model)
                                <li>{{ $model->title }}</li>
                            @endforeach

                        </ul>
                        <div class="services_btn">
                            <a href="{{ route('client.services') }}">{{ __('word.detail') }}</a>
                        </div>
                    </div>

                    <div class="services_item">
                        <div class="services_img">
                            <img class="card-img-top border-bottom py-2"
                                src="{{ asset('client/assets/images/services_2.png') }}" alt="...">
                        </div>
                        <h2>{{ __('menu.categories') }}</h2>
                        <ul>
                            @foreach ($categories as $category)
                                <li>{{ $category->title }}</li>
                            @endforeach

                        </ul>
                        <div class="services_btn">
                            <a href="{{ route('client.categories') }}">{{ __('word.detail') }}</a>
                        </div>
                    </div>

                    <div class="services_item">
                        <div class="services_img">
                            <img src="{{ asset('client/assets/images/services_3.png') }}" alt="services_img" />
                        </div>
                        <h2>Kataloqlar</h2>
                        <ul>
                            <li>Suppliers Search</li>

                        </ul>
                        <div class="services_btn">
                            <a href="#">{{ __('word.detail') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="about">
            <div class="background">
                <video autoplay loop muted playsinline class="back_video">
                    <source
                        src="{{ $settings->home_video != '#' ? $settings->home_video : asset('client/assets/images/about.mp4') }}"
                        type="video/mp4" />

                </video>

            </div>


            <div class="overlay">
                <div class="about_block">
                    <div class="container">
                        <h2>{{ $settings->about_title }} </h2>
                        <div class="about_text">
                            <p>
                                {!! $settings->about_desc !!}
                            </p>
                        </div>
                        <div class="about_btn">
                            <a href="#">{{ __('word.detail') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="testimonials">
            <div class="container">
                <div class="testimonials_heading">
                    <h2>{{ __('word.customers_comment') }}</h2>
                    <div class="slider_nav">
                        <button class="prev_testimonial">
                            <i class="fa-solid fa-angle-left"></i>
                        </button>
                        <button class="next_testimonial">
                            <i class="fa-solid fa-angle-right"></i>
                        </button>
                    </div>
                </div>
                <div class="testimonials_content">
                    @foreach ($contacts as $contact)
                        <div class="swiper testimonials_swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="testimonial_card">
                                        <div class="card_heading">
                                            <img src="{{ asset('client/assets/images/testimonials-icon.png') }}"
                                                alt="" />
                                            <p>{{ $contact->proffession }}</p>
                                        </div>
                                        <div class="card_content">
                                            <p>
                                                {{ $contact->note }}
                                            </p>
                                        </div>
                                        <div class="card_footer">
                                            <img src="{{ asset('client/assets/images/user.png') }}" alt="" />
                                            <div class="card_info">
                                                <p>{{ $contact->fname }}</p>
                                                <p>{{ $contact->proffession }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="testimonials-footer">
                    <div class="slider_nav">
                        <button class="prev_testimonial">
                            <i class="fa-solid fa-angle-left"></i>
                        </button>
                        <button class="next_testimonial">
                            <i class="fa-solid fa-angle-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <section class="contact">
            <div class="container">
                <div class="contact_block">
                    <div class="contact_info">
                        <div class="contact_info_img">
                            <img src="{{ asset('client/assets/images/contact.jpg') }}" alt="contact" />
                        </div>
                        <div class="contact_overlay">
                            <h2>{{ __('word.contact_us') }}</h2>
                            <div class="contact_notification">
                                <p>
                                    {{ __('word.contact_notification') }}
                                </p>
                            </div>
                            <ul class="contacts">
                                <li>
                                    <div class="contacts_email_img">
                                        <img src="{{ asset('client/assets/images/email.svg') }}" alt="email" />
                                    </div>
                                    <span>{{ $settings->email }}</span>
                                </li>
                                <li>
                                    <div class="contacts_phone_img">
                                        <img src="{{ asset('client/assets/images/phone.svg') }}" alt="phone" />
                                    </div>
                                    <span>{{ $settings->phone }}</span>
                                </li>
                                <li>
                                    <div class="contacts_location_img">
                                        <img src="{{ asset('client/assets/images/location.svg') }}" alt="location" />
                                    </div>
                                    <span>{{ $settings->address }}</span>
                                </li>
                            </ul>
                            <ul class="social_media">
                                <li>
                                    <a href="{{ $settings->fb }}">
                                        <div class="facebook_img">
                                            <img src="{{ asset('client/assets/images/facebook.svg') }}" alt="facebook" />
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $settings->inst }}">
                                        <div class="instagram_img">
                                            <img src="{{ asset('client/assets/images/instagram.svg') }}"
                                                alt="instagram" />
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $settings->phone }}">
                                        <div class="whatsapp_img">
                                            <img src="{{ asset('client/assets/images/whatsapp.svg') }}" alt="whatsapp" />
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="contact_form">
                        <h2>{{ __('word.request') }}</h2>
                        <div class="contact_notification">
                            <p>{{ __('word.feedback') }}</p>
                        </div>
                        @if($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
                        <form action="{{ route('client.contact.submit') }}" method="POST">
                            @csrf

                            <div class="form_main">
                                <div class="form_block">
                                    <div class="input_block">
                                        <span class="name_title">{{ __('word.name') }},{{ __('word.surname') }}</span>
                                        <div class="input_item">
                                            <label for="fname">
                                                <div class="user_img">
                                                    <img src="{{ asset('client/assets/images/user.svg') }}"
                                                        alt="user" />
                                                </div>
                                            </label>
                                            <input type="text" id="fname" name="fname" required />
                                        </div>
                                    </div>
                                    <div class="input_block">
                                        <span class="email_title">{{ __('word.email') }}</span>
                                        <div class="input_item">
                                            <label for="email">
                                                <div class="letter_img">
                                                    <img src="{{ asset('client/assets/images/letter.svg') }}"
                                                        alt="letter" />
                                                </div>
                                            </label>
                                            <input type="email" id="email" name="email" />
                                        </div>
                                    </div>
                                    <div class="input_block">
                                        <span class="profession_title">{{ __('word.position') }}</span>
                                        <div class="input_item">
                                            <label for="profession">
                                                <div class="stairs_img">
                                                    <img src="{{ asset('client/assets/images/stairs.svg') }}"
                                                        alt="stairs" />
                                                </div>
                                            </label>
                                            <input type="text" id="proffession" name="proffession" />
                                        </div>
                                    </div>
                                    <div class="input_block">
                                        <span class="phone_title">{{ __('word.phone_number') }}</span>
                                        <div class="input_item">
                                            <label for="number">
                                                <div class="device_img">
                                                    <img src="{{ asset('client/assets/images/device.svg') }}"
                                                        alt="device" />
                                                </div>
                                            </label>
                                            <input type="tel" id="number" name="number" />
                                        </div>
                                    </div>
                                    <div class="input_block">
                                        <span class="file_title">{{ __('word.download_file') }}</span>
                                        <div class="input_item">
                                            <label for="file" class="custom_file_upload">
                                                <div class="file_img">
                                                    <img src="{{ asset('client/assets/images/file.svg') }}"
                                                        alt="file" />
                                                </div>
                                                <p>{{ __('word.download_file') }}</p>
                                            </label>
                                            <input type="file" id="file" hidden name="file" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form_note">
                                    <label for="note">{{ __('word.note') }}</label>
                                    <textarea name="note" id="note" placeholder="Qeydinizi göndərin"></textarea>
                                </div>
                            </div>
                            <button>{{ __('word.send') }}</button>
                        </form>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif


                    </div>
                </div>
            </div>
        </section>
    </main>

    <div class="scroll_top_block">
        <a id="scroll_top" href="#">
            <img src="{{ asset('client/assets/images/scroll_top_btn.png') }}" />
            <img src="{{ asset('client/assets/images/scroll_top_btn.png') }}" />
        </a>
    </div>


@endsection
@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var videoElement = document.querySelector('.back_video source');
            videoElement.src =
                "{{ $settings->home_video != '#' ? asset($settings->home_video) : asset('client/assets/images/about.mp4') }}";
        });
    </script>
@endpush
