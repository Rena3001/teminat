@extends('client.layout.master')
@section('page_title', "Products")
@push('styles')
<link rel="stylesheet" href="{{ asset('client/assets/style/wiresandfluxes.css') }}" />
<link rel="stylesheet" href="{{ asset('client/assets/style/products.css') }}" />
@endpush
@section('content')
<nav class="breadCrump container">
    <ul>
        <li>
            <a href="{{route('client.home')}}">{{__('menu.home')}}</a>
        </li>
        <li>
            <a href="{{route('client.categories')}}">{{__('menu.products')}}</a>
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
                        <form class="form" action="{{route('client.products')}}">
                            <input type="text" placeholder="{{__('search.product')}}"  id="search_all_products" name="search_products" />
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
                                   <form class="category_form" action="{{ route('client.products') }}" method="GET">
                            <label>Category</label>
                            <div class="custom_select_wrapper">
                              <div class="custom_select" tabindex="0">
                                  <span class="custom_select_text" id="parent_category_text">Select Category</span>
                                  <ul class="custom_options">
                                     @foreach ($parents as $parent)
                                       <li data-value="{{ $parent->slug }}">{{ $parent->title }}</li>
                                   @endforeach
                                 </ul>
                              </div>
                                <input type="hidden" name="parent_category" id="parent_category_input" value="{{$selectedParent ? $selectedParent->slug : ''}}" />
                         </div>

    <!--------- sub-category ------->
                        <div class="custom_select_wrapper">
                            <div class="custom_select" tabindex="0">
                               <span class="custom_select_text" id="child_category_text">Select Sub Category</span>
                                <ul class="custom_options" id="subcategory_options">
                                 <li data-value="">Select Sub Category</li>
                <!-- Sub-category options will be dynamically populated based on selected category -->
                              </ul>
                         </div>
                            <input type="hidden" name="category" id="category_input" value="{{$selectedChild ? $selectedChild->slug : ''}}" />
                         </div>

                 <button class="category_button" type="submit">
                    <i class="fas fa-search"></i> {{ __('btn.go_to_category') }}
                </button>
                  </form>
                    </div>
                </section>
            </aside>
            <section class="unalloyed_electrodes mainBox">


                <h1 class="mainbox__heading">
                    <img src="{{$settings->logo_dark}}" alt="">
                    {{__('menu.products')}}
                </h1>

                <section class="products_cards_grid">
                    <!-- Products Cards -->
                    @if ($products->count())
                    @foreach ($products as $product)
                    <a href="{{ route('client.product.detail', $product->slug) }}">
                        <div class="product_detail_card">
                            <div class="electrode_card_logo">
                                <img src="{{$product->brand->image}}" alt="{{$product->brand->title}}" />
                            </div>
                            <div class="electrode_card_img">
                                <img src="{{$product->image}}" alt="{{$product->title}}" />
                            </div>
                            <div class="card_detail">
                                <p>{{$product->title}}</p>
                                @if ($product->model?->title)
                                <p>({{$product->model?->title}})</p>
                                @endif
                                <button>{{__('word.product_detail')}}</button>
                            </div>
                        </div>
                    </a>
                    @endforeach
                    @else
                    <div class="not_found_box">
                        <p>{{__('sentence.404_product')}}</p>
                    </div>
                    @endif
                </section>
            </section>
        </div>
    </div>
</main>


@endsection


@push('js')
    <script>
     $(document).ready(function() {

        if ($('#parent_category_input').val()) {
            const parentSlug = $('#parent_category_input').val();
            $('#parent_category_text').text('{{$selectedParent?->title}}');
            $.ajax({
                    url: "{{ route('client.fetch.subcategories', '') }}/" + parentSlug,
                    type: 'GET',
                    success: function(response) {
                        let subCategoryOptions = $('#subcategory_options');
                        subCategoryOptions.empty();
                        if (response.categories.length > 0) {
                            subCategoryOptions.append('<li data-value="">Select Sub Category</li>');
                            $.each(response.categories, function(index, subCategory) {
                                subCategoryOptions.append('<li data-value="' + subCategory.slug[response.lang] + '">' + subCategory.title[response.lang] + '</li>');
                            });
                        } else {
                            subCategoryOptions.append('<li data-value="">No sub-categories found</li>');
                        }
                    },
                    error: function() {
                        alert('Failed to fetch sub-categories. Please try again.');
                    }
                });
        }

        if($('#category_input').val()){
            $('#parent_category_text').text('{{$selectedParent?->title}}');
            $('#child_category_text').text('{{$selectedChild?->title}}');
        }

        $('.custom_select').on('click', 'li', function() {
            const value = $(this).data('value');
            const text = $(this).text();
            const input = $(this).closest('.custom_select_wrapper').find('input[type="hidden"]');
            const span = $(this).closest('.custom_select').find('.custom_select_text');

            span.text(text);
            input.val(value);

            if (input.attr('name') === 'parent_category') {
                fetchSubCategories(value);
            }
        });

        function fetchSubCategories(parentSlug) {
            if (parentSlug) {
                $.ajax({
                    url: "{{ route('client.fetch.subcategories', '') }}/" + parentSlug,
                    type: 'GET',
                    success: function(response) {
                        let subCategoryOptions = $('#subcategory_options');
                        subCategoryOptions.empty();
                        if (response.categories.length > 0) {
                            subCategoryOptions.append('<li data-value="">Select Sub Category</li>');
                            $.each(response.categories, function(index, subCategory) {
                                subCategoryOptions.append('<li data-value="' + subCategory.slug[response.lang] + '">' + subCategory.title[response.lang] + '</li>');
                            });
                        } else {
                            subCategoryOptions.append('<li data-value="">No sub-categories found</li>');
                        }
                    },
                    error: function() {
                        alert('Failed to fetch sub-categories. Please try again.');
                    }
                });
            } else {
                $('#subcategory_options').empty().append('<li data-value="">Select Sub Category</li>');
            }
        }
    });
    </script>
    <script src="{{ asset('client/assets/script/select.js') }}"></script>

@endpush
