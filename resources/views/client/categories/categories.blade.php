@extends('client.layout.master')

@section('page_title', "Categories")

@push('styles')
<link rel="stylesheet" href="{{ asset('client/assets/style/products.css') }}" />
<style>
    .category a.active {
        font-weight: bold;
        color: white;
        background: #fe6000;
        border-bottom: 2px solid #007bff;
    }
</style>
@endpush

@section('content')
<main>
    <section class="products">
        <div class="container">
            <div class="category">
                @foreach ($tags as $tag)
                <a href="javascript:void(0);"
                   class="tag-link {{ in_array($tag->id, $selectedTags) ? 'active' : '' }}"
                   data-id="{{ $tag->id }}">
                   {{ $tag->title }}
                </a>
                @endforeach
            </div>
            <div class="products_block" id="products-block">
                @foreach ($categories as $category)
                <div class="products_item">
                    <div class="products_img">
                        <img src="{{ $category->image }}" alt="product" />
                    </div>
                    <div class="products_about">
                        <h3>{{ $category->title }}</h3>
                        <div class="products_text">
                            <p>{{ $category->description }}</p>
                        </div>
                        <div class="show_more">
                            <a href="#" class="show_more_btn">{{ __('word.more') }}</a>
                            <a href="#" class="learn_more_btn">Ətraflı</a>
                        </div>
                        <div class="products_btns">
                            <a href="#">{{ __('word.order_offer') }}</a>
                            <a href="#">{{ __('word.inquiry') }}</a>
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
    document.addEventListener('DOMContentLoaded', function() {
        let selectedTags = @json($selectedTags);

        document.querySelectorAll('.tag-link').forEach(tagLink => {
            tagLink.addEventListener('click', function() {
                const tagId = parseInt(this.getAttribute('data-id'));
                const isSelected = selectedTags.includes(tagId);

                // Toggle the selected tag
                if (isSelected) {
                    selectedTags = selectedTags.filter(id => id !== tagId);
                } else {
                    selectedTags.push(tagId);
                }

                // Make the AJAX request
                fetch("{{ route('client.categories') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ tag: selectedTags })
                })
                .then(response => response.json())
                .then(data => {
                    // Update the categories list
                    const productsBlock = document.getElementById('products-block');
                    productsBlock.innerHTML = data.html;

                    // Update the selected tags visually
                    document.querySelectorAll('.tag-link').forEach(link => {
                        const id = parseInt(link.getAttribute('data-id'));
                        if (selectedTags.includes(id)) {
                            link.classList.add('active');
                        } else {
                            link.classList.remove('active');
                        }
                    });
                })
                .catch(error => console.error('Error:', error));
            });
        });
    });
</script>
@endpush
