@extends('client.layout.master')
@section('page_title', "Products")
@push('styles')
<link rel="stylesheet" href="{{ asset('client/assets/style/products.css') }}" />
@endpush
@section('content')
    <nav class="breadCrump container">
      <ul>
          <li>
              <a href="{{route('client.home')}}">{{__('site.home')}}</a>
          </li>
          <li>
              <a href="{{route('client.categories')}}">{{__('site.products')}}</a>
          </li>
      </ul>
    </nav>

    <main>
      <div class="container">

        <div class="sub_container">
          <aside>
            <section class="search_box mainBox">
              <div class="search_panel_heading">
                <p class="margin_inline">{{__('site.search_product')}}</p>
              </div>
              <div class="search_box_input margin_inline">
                <form class="form">
                  <input type="text" placeholder="{{__('site.search_product')}}" />
                  <button class="product_search_button">
                    <i class="fas fa-search"></i>
                  </button>
                </form>
              </div>
            </section>
            <section class="categories_box"></section>
            <section class="filter_box"></section>
          </aside>
          <section class="unalloyed_electrodes mainBox">
            <!-- <div class="panel_heading">
              <div>ICON</div>
              <h1>Unalloyed Electrodes</h1>
            </div> -->

            <h1 class="mainbox__heading">
              <img src="./assets/images/logo/logo dark.png" alt="">
              {{__('site.unalloyed_electrodes')}}
            </h1>

            <section class="products_cards_grid">
          <!-- Products Cards -->
          @foreach ($products as $product)
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
                  src="{{ $product->image }}"
                  alt="{{$product->title}}"
                />
              </div>
              <div class="card_detail">
                <p>{{$product->title}}</p>
                <p>{{$product->brand}}</p>
                <button>{{__('site.product-detail')}}</button>
              </div>
            </div>
          </a>
          @endforeach
            </section>
          </section>
        </div>
      </div>
    </main>


    @endsection
