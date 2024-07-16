@extends('client.layout.master')
@section('page_title', "Wires and Fluxes")
@push('styles')
<link rel="stylesheet" href="{{ asset('client/assets/style/wiresandfluxes.css') }}" />
@endpush
@section('content')

    <nav class="breadCrump container">
      <ul>
          <li>
              <a href="{{route('client.home')}}">Home</a>
          </li>
          <li>
              <a href="{{route('client.categories')}}">Products</a>
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
              <!-- ======category====== -->
              <section class="category_panel search_box mainBox">
                <div class="category_panel_heading">
                  <p class="margin_inline">{{__('site.category')}}</p>
                </div>
                <div class="category_panel_body margin_inline">
                  <form class="category_form">
                    <label>{{__('site.category')}}</label>
                    <select id="options" name="category">
                      <option value="option1">products</option>
                      <option value="option2">products</option>
                      <option value="option3">products</option>
                    </select>

                    <!-- sub-category -->

                    <select id="options" name="sub-category">
                      <option value="option1">products</option>
                      <option value="option2">products</option>
                      <option value="option3">products</option>
                    </select>

                    <button class="category_button">
                      <i class="fas fa-search"></i>{{__('site.go_to_category')}}
                    </button>
                  </form>
                </div>
              </section>
            </aside>

            <!-- sections -->
            <section class="wires_and_fluxes mainBox">

              <h1 class="mainbox__heading">
                <img src="./assets/images/logo/logo dark.png" alt="">
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
                {{__('site.category-detail')}}...

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




