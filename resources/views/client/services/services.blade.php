@extends('client.layout.master')
@section('page_title', 'Services')
@push('styles')
    <link rel="stylesheet" href="{{ asset('client/assets/style/services.css') }}" />
@endpush
@section('content')

    <main>
        <section class="services">
            <aside class="servicesNav" data-titles="@json($models->pluck('title'))">
                <div class="swiper-button-prev">
                    <i class="fa-solid fa-chevron-left"></i>
                </div>
                <div class="swiper-pagination"></div> <!-- pagination bura dolacaq -->
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
                                        <img src="{{ $model->image }}" alt="{{ $model->title }}" />
                                    </div>
                                @endif
                                <div class="serviceCard__desc">
                                    <p>{{ $model->description }}</p>
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
    <script>
        let models = @json($models->pluck('title'));

        const swiper = new Swiper(".services_content", {
            slidesPerView: "auto",
            spaceBetween: 80,
            pagination: {
                el: ".servicesNav .swiper-pagination",
                clickable: true,
                renderBullet: function(index, className) {
                    return '<span class="' + className + '">' + models[index] + '</span>';
                },
            },
            navigation: {
                nextEl: ".servicesNav .swiper-button-next",
                prevEl: ".servicesNav .swiper-button-prev",
            },
        });
    </script>
    
    <script src="{{ asset('client/assets/script/services.js') }}"></script>
@endpush
