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
                        <form class="form" action="{{route('client.products')}}">
                            <input type="text" placeholder="{{__('search.product')}}" id="search_all_products" name="search_products" />
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

            <!-- sections -->
            <section class="wires_and_fluxes mainBox">

                <h1 class="mainbox__heading">
                    <img src="{{$settings->logo_dark}}" alt="">
                    {{$settings->categories_title}}
                </h1>

                <section class="card_section">
                    @if ($categories->count())
                    @foreach ($categories as $category)
                    <div class="category_detail_image">
                        <a href="{{route('client.subcategories',$category->id)}}">
                            <div class="hover_effect">
                                <img src="{{ $category->image }}" alt="{{$category->title}}" />
                            </div>
                            <div class="hover_content">
                                <h4 class="hover_title">
                                    <strong>{{ $category->title }}</strong>
                                </h4>
                                <p class="hover_description">
                                    {{__('btn.category_detail')}}...

                                </p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    @else
                    <div class="not_found_box">
                        <p>{{__('sentence.404_category')}}</p>
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
