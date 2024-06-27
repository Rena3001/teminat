@extends('admin.layout.master')

@push('page_title')
 Məhsulların Məlumatları
@endpush
@push('section_title')
 Məhsulların Ətraflı Məlumatları
@endpush

@section('content')
<div class="card card-primary mb-3">
    <div class="card-header">
        <h3 class="card-title d-flex justify-content-between align-items-center">Ətraflı <a
                href="{{route('admin.products.index')}}" class="btn btn-warning">Geri qayıt</a></h3>
    </div>
    <div class="card-body">
        <div class="row" style="gap: 20px;">
            <div class="col-md-12">
                <div class="card border border-success w-fit">
                    <div class="card-body">
                        <h4 class="card-title text-warning">Title</h4>
                        @foreach ($product->titles as $lang => $value)
                        <p class="card-text"><strong class="me-3 text-info">{{ strtoupper($lang) }}</strong>{{ $value }}</p>
                        @endforeach
                    </div>
                </div>
                <div class="card border border-success w-fit">
                    <div class="card-body">
                        <h4 class="card-title text-warning">Category</h4>
                        @if ($category)
                            @foreach ($category->getTranslations('title') as $lang => $value)
                            <p class="card-text"><strong class="me-3 text-info">{{ strtoupper($lang) }}</strong>{{ $value }}</p>
                            @endforeach
                        @else
                        <p class="card-text text-muted">Category mövcud deyil</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card border border-success w-fit">
                    <div class="card-body">
                        <h4 class="card-title text-warning">Slaq</h4>
                        @foreach ($product->slugs as $lang => $value)
                        <p class="card-text"><strong class="me-3 text-info">{{ strtoupper($lang) }}</strong>{{ $value }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card border border-success w-fit">
                    <div class="card-body">
                        <h4 class="card-title text-warning">Şəkil</h4>
                        @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="img-fluid">
                        @else
                        <p class="card-text text-muted">Şəkil mövcud deyil</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
