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
        <h3 class="card-title d-flex justify-content-between align-items-center">Ətraflı
            <div class="btn-box">
                <a href="{{route('admin.products.edit',$product->id)}}" class="btn btn-info">Yenilə</a>
                <a href="{{route('admin.products.index')}}" class="btn btn-warning">Geri qayıt</a>
            </div>
        </h3>
    </div>
    <div class="card-body">
        <div class="row" style="row-gap: 20px;">
            <div class="col-md-8">
                <div class="row" style="row-gap: 20px;">
                    <div class="col-lg-6">
                        <div class="card border border-success w-fit">
                            <div class="card-body">
                                <h4 class="card-title text-warning">Başlıq</h4>
                                @foreach ($product->titles as $lang => $value)
                                <p class="card-text"><strong
                                        class="me-3 text-info">{{ strtoupper($lang) }}</strong>{{ $value }}
                                </p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card border border-success w-fit">
                            <div class="card-body">
                                <h4 class="card-title text-warning">Kateqoriya</h4>
                                @foreach ($category as $lang => $value)
                                <p class="card-text"><strong
                                        class="me-3 text-info">{{ strtoupper($lang) }}</strong>{{ $value }}
                                </p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card border border-success w-fit">
                            <div class="card-body">
                                <h4 class="card-title text-warning">Slaq</h4>
                                @foreach ($product->slugs as $lang => $value)
                                <p class="card-text"><strong
                                        class="me-3 text-info">{{ strtoupper($lang) }}</strong>{{ $value }}
                                </p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card border border-success w-fit">
                            <div class="card-body">
                                <h4 class="card-title text-warning">Brend</h4>
                                <p class="card-text">{{ $brand->title }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card border border-success w-fit">
                            <div class="card-body">
                                <h4 class="card-title text-warning">Yaranma tarixi</h4>
                                <p class="card-text">{{ $product->created_at }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card border border-success w-fit">
                            <div class="card-body">
                                <h4 class="card-title text-warning">Dəyişmə tarixi</h4>
                                <p class="card-text">{{ $product->updated_at }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card border border-success w-fit">
                            <div class="card-body">
                                <h4 class="card-title text-warning">Pdf fayl</h4>
                                <embed src="{{asset($product->pdf_file)}}" width="800px" height="800px" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border border-success w-fit">
                    <div class="card-body">
                        <h4 class="card-title text-warning">Şəkil</h4>
                        <img src="{{ asset($product->image) }}" alt="Product Image" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection