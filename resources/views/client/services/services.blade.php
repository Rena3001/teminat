@extends('client.layout.master')
@section('page_title', "Services")
@push('styles')
<link rel="stylesheet" href="{{ asset('client/assets/style/services.css') }}" />

@endpush
@section('content')

    <main>
      <section class="services">
        <aside class="servicesNav" data-titles="">
          <!-- serviceCard__titles in data-titles -->
          <div class="swiper-button-prev">
            <i class="fa-solid fa-chevron-left"></i>
          </div>
          @foreach ($models as $model)
          <div class="swiper-pagination">
            <span class="swiper-pagination-bullet" tabindex="">{{ $model->title }}</span>
        </div>
        @endforeach
          <div class="swiper-button-next">
            <i class="fa-solid fa-chevron-right"></i>
          </div>
        </aside>

        <div class="swiper services_content">
          <div class="swiper-wrapper">
            @foreach ($models as $model)
            <div class="swiper-slide">
              <div class="serviceCard">
                <h4 class="serviceCard__title">{{ $model->title }}</h4>
                @if ($model->image)
                <div class="serviceCard__img">
                  <img
                    src="{{ $model->image }}"
                    alt="{{ $model->title }}"
                  />
                </div>
                @endif
                <div class="serviceCard__desc">
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                    do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit
                    esse cillum dolore eu fugiat nulla pariatur.Lorem ipsum
                    dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua.
                  </p>
                </div>
              </div>
            </div>
            @endforeach


          </div>
        </div>
      </section>
    </main>


@endsection
@push('js')
<script src="{{ asset('client/assets/script/services.js') }}"></script>

@endpush
