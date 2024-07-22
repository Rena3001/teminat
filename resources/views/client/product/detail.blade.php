@extends('client.layout.master')
@section('page_title', "Product - Detail")
@push('styles')
<link rel="stylesheet" href="{{ asset('client/assets/style/detail.css') }}" />
@endpush
@section('content')

<nav class="breadCrump container">
    <ul>
        <li>
            <a href="{{ route('client.home') }}">{{ __('menu.home') }}</a>
        </li>
        <li>
            <a href="{{ route('client.categories') }}">{{ __('menu.products') }}</a>
        </li>
    </ul>
</nav>

<main class="mainBox container">
    <h1 class="mainbox__heading">
        <img src="{{ $settings->logo_dark }}" alt="">
        {{ $product->title }}
    </h1>

    <section class="mainBox__content">
        <div class="product">
            <div class="product__content">
                <div class="product__img">
                    <img src="{{ $product->image }}" alt="{{ $product->title }}">
                </div>

                <table class="product__detail">
                    <thead>
                        <tr>
                            <td colspan="2">
                                <div class="product__brand--img">
                                    <img src="{{ $product->brand->image ?? 'default_logo.png' }}" alt="{{ $product->brand->title ?? 'N/A' }}">
                                </div>
                            </td>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <th>{{ __('word.brand') }}:</th>
                            <td>{{ $product->brand->title ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Model:</th>
                            <td>{{ $product->model }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="product__button">
                    <a href="{{ $product->datasheet }}" target="_blank">{{ __('word.datasheet') }}</a>
                </div>
            </div>
        </div>

        <div class="product_desc">
            <div class="product_iframe">
                <iframe src="{{ $product->pdf_file }}" frameborder="0"></iframe>
            </div>

            <div class="other">


                <div class="swiper">
                    <div class="swiper-wrapper">
                        <!-- Similar products slider items -->
                        @foreach ($relateds as $similarProduct)

                        <div class="swiper-slide">
                            <a href="{{ route('client.product.detail', $similarProduct->id) }}">
                                <div class="product_detail_card">
                                    <div class="electrode_card_logo">
                                        <img src="{{ $similarProduct->brand->image ?? 'default_logo.png' }}" alt="{{ $similarProduct->brand->title ?? 'N/A' }}">
                                    </div>
                                    <div class="electrode_card_img">
                                        <img src="{{ $similarProduct->image }}" alt="{{ $similarProduct->title }}">
                                    </div>
                                    <div class="card_detail">
                                        <p>{{ $similarProduct->title }}</p>
                                        @if($similarProduct->model)

                                        <p>({{ $similarProduct->model }})</p>
                                        @endif
                                        <button>{{ __('word.product_detail') }}</button>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
