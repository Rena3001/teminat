@extends('client.layout.master')
@section('page_title', "About")
@push('styles')
<link rel="stylesheet" href="{{ asset('client/assets/style/about.css') }}" />
@endpush
@section('content')


    <main>
      <section class="about">
        <div class="container">
          <div class="about-content">
            <h2 class="about_heading">{{ __('word.about_site') }}</h2>
            <div class="about_text">
              <p>
                {!! $settings->about_desc !!}
              </p>
            </div>
          </div>
          <div class="about_video">
            <video
              autoplay
              loop
              muted
              plays-inline
              src="{{ $settings->about_video }}"
            ></video>
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
                                        <img src="{{ asset('client/assets/images/testimonials-icon.png') }}" alt="" />
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
    </main>


@endsection
