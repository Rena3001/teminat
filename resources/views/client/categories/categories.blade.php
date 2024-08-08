@extends('client.layout.master')
@section('page_title', "CAtegories")
@push('styles')
<link rel="stylesheet" href="{{asset('client/assets/style/products.css')}}" />
@endpush
@section('content')


    <main>
      <section class="products">
        <div class="container">
          <div class="category">
            @foreach ($tags as $tag )
            <a href="">{{ $tag->title }}</a>
            @endforeach
          </div>
          <div class="products_block">
            @foreach ($categories as $category)
            <div class="products_item">
              <div class="products_img">
                <img src="{{ $category->image }}" alt="product" />
              </div>
              <div class="products_about">
                <h3>{{ $category->title }}</h3>
                <div class="products_text">
                  <p>
                    {{$category->description}}
                  </p>
                </div>
                <div class="show_more">
                  <a href="#" class="show_more_btn">{{ __('word.more') }}</a>
                  <a href="#" class="learn_more_btn">Ətraflı</a>
                </div>
                <div class="products_btns">
                  <a href="#"
                    >{{ __('word.order_offer') }}</a
                  >
                  <a href="#">{{__('word.inquiry')}}</a>
                </div>
              </div>
            </div>
            @endforeach

          </div>
        </div>
      </section>
    </main>


@endsection

