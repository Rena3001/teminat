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
                        <form class="form">
                            <input type="text" placeholder="{{__('search.product')}}" />
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
                        <form class="category_form" action="{{route('client.products')}}">
                            <select id="parent_category">
                                <option value="">Select Category</option>
                                @foreach ($parents as $parent)
                                <option value="{{$parent->id}}">{{$parent->title}}</option>
                                @endforeach
                            </select>

                            <!-- sub-category -->

                            <select id="category" name="category">
                                <option value="">Select Sub Category</option>
                            </select>

                            <button class="category_button">
                                {{__('btn.go_to_category')}}
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
                    @foreach ($products as $product)
                    <a href="{{ route('client.product.detail', $product->id) }}">
                        <div class="product_detail_card">
                            <div class="electrode_card_logo">
                                <img src="{{$product->brand->image}}" alt="{{$product->brand->title}}" />
                            </div>
                            <div class="electrode_card_img">
                                <img src="{{$product->image}}" alt="{{$product->title}}" />
                            </div>
                            <div class="card_detail">
                                <p>{{$product->title}}</p>
                                <!-- <p>{{$product->brand}}</p> -->
                                <button>{{__('word.product_detail')}}</button>
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


@push('js')
    <script>
    $('#parent_category').change(function () {
        let category_id = $(this).val();
        if (category_id) {
            $.ajax({
            url: "{{ route('client.fetch.subcategories', '') }}/" + category_id,
            type: 'GET',
            success: function (response) {
                let subCategoryDropdown = $('#category');
                subCategoryDropdown.empty();

                if (response.categories.length > 0) {
                    $.each(response.categories, function (index, subCategory) {
                        subCategoryDropdown.append(new Option(subCategory.title[response.lang], subCategory.id));
                    });
                } else {
                    subCategoryDropdown.append(new Option('No sub-categories found', ''));
                }
            },
            error: function () {
                alert('Failed to fetch sub-categories. Please try again.');
            }
        });
        }
    });
    </script>
@endpush
