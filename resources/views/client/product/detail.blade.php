@extends('client.layout.master')
@section('page_title', "Product - Detail")
@push('styles')
<link rel="stylesheet" href="{{ asset('client/assets/style/detail.css') }}" />
@endpush
@section('content')

<nav class="breadCrump container">
    <ul>
        <li>
            <a href="{{ route('client.home') }}">{{ __('site.home') }}</a>
        </li>
        <li>
            <a href="{{ route('client.categories') }}">{{ __('site.products') }}</a>
        </li>
    </ul>
</nav>

<main class="mainBox container">
    <h1 class="mainbox__heading">
        <img src="{{ $settings->image_logo_dark }}" alt="">
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
                                    <img src="{{ $product->brand->logo ?? 'default_logo.png' }}" alt="{{ $product->brand->title ?? 'N/A' }}">
                                </div>
                            </td>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <th>{{ __('site.brand') }}:</th>
                            <td>{{ $product->brand->title ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Model:</th>
                            <td>{{ $product->model }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="product__button">
                    <a href="{{ $product->datasheet }}" target="_blank">{{ __('site.datasheet') }}</a>
                </div>
            </div>
        </div>

        <div class="product_desc">
            <div class="product_iframe">
                <iframe src="{{ $product->datasheet }}" frameborder="0"></iframe>
            </div>

            <div class="other">
                <div class="other__heading">
                    <h4>Similar Products</h4>
                    <a href="#">See All</a>
                </div>

                <div class="swiper">
                    <div class="swiper-wrapper">
                        <!-- Similar products slider items -->
                        @foreach ($similarProducts as $similarProduct)
                        <div class="swiper-slide">
                            <a href="{{ route('client.product.detail', $similarProduct->id) }}">
                                <div class="product_detail_card">
                                    <div class="electrode_card_logo">
                                        <img src="{{ $similarProduct->brand->logo ?? 'default_logo.png' }}" alt="{{ $similarProduct->brand->title ?? 'N/A' }}">
                                    </div>
                                    <div class="electrode_card_img">
                                        <img src="{{ $similarProduct->image }}" alt="{{ $similarProduct->title }}">
                                    </div>
                                    <div class="card_detail">
                                        <p>{{ $similarProduct->title }}</p>
                                        <p>({{ $similarProduct->model }})</p>
                                        <button>PRODUCT DETAIL</button>
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
