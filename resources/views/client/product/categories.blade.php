@extends('client.layout.master')
@section('page_title', "Wires and Fluxes")
@push('styles')
<link rel="stylesheet" href="{{ asset('client/assets/style/wiresandfluxes.css') }}" />
@endpush
@section('content')

    <nav class="breadCrump container">
      <ul>
          <li>
              <a href="{{route('client.home')}}">{{ __('menu.home') }}</a>
          </li>
          <li>
              <a href="{{route('client.categories')}}">{{ __('menu.products') }}</a>
          </li>
      </ul>
    </nav>


    <main>
        <div class="container">

          <div class="sub_container">
            <aside>
              <section class="search_box mainBox">
                <div class="search_panel_heading">
                  <p class="margin_inline">{{__('search.product')}}</p>
                </div>
                <div class="search_box_input margin_inline">
                  <form class="form">
                    <input type="text" placeholder="{{__('search.product')}}" id="search_products_category" name="search_products_category"/>
                    <button class="product_search_button">
                      <i class="fas fa-search"></i>
                    </button>
                  </form>
                </div>
              </section>
              <!-- ======category====== -->
              <section class="category_panel search_box mainBox">
                <div class="category_panel_heading">
                  <p class="margin_inline">{{__('word.categories')}}</p>
                </div>
                <div class="category_panel_body margin_inline">
                  <form class="category_form">
                    <select id="category" name="category">
                      <option value="option1">products</option>
                      <option value="option2">products</option>
                      <option value="option3">products</option>
                    </select>

                    <!-- sub-category -->

                    <select id="sub-category" name="sub-category">
                      <option value="option1">products</option>
                      <option value="option2">products</option>
                      <option value="option3">products</option>
                    </select>

                    <button class="category_button">
                      {{__('btn.go_to_category')}}
                    </button>
                  </form>
                </div>
              </section>
            </aside>

            <!-- sections -->
            <section class="wires_and_fluxes mainBox">

              <h1 class="mainbox__heading">
                <img src="{{$settings->logo_dark}}" alt="">
                {{$settings->categories_title}}
              </h1>

              <section class="card_section">
                @foreach ($models as $model)
                <div class="category_detail_image">
                    <a href="#">
                      <div class="hover_effect">
                        <img
                          src="{{ $model->image }}"
                          alt="{{$model->title}}"
                        />
                      </div>
                      <div class="hover_content">
                        <h4 class="hover_title">
                          <strong>{{ $model->title }}</strong>
                        </h4>
                        <p class="hover_description">
                {{__('btn.category_detail')}}...

                        </p>
                      </div>
                    </a>
                  </div>
                @endforeach
              </section>
            </section>
          </div>
        </div>
      </main>
    @endsection




