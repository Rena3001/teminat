@extends('admin.layout.master')

@push('page_title')
Dilin Məlumatları
@endpush
@push('section_title')
Dilin Ətraflı Məlumatları
@endpush

@section('content')
<div class="card card-primary  mb-3">
    <div class="card-header">
        <h3 class="card-title d-flex justify-content-between align-items-center">
            Ətraflı
            <div class="btn-box">
                <a href="{{route('admin.model_products.edit', $model_product->id)}}" class="btn btn-info">Yenilə</a>
                <a href="{{route('admin.model_products.index')}}" class="btn btn-warning">Geri qayıt</a>
            </div>
        </h3>

    </div>
    <div class="card-body">
        <div class="row" style="gap: 20px;">
            <div class="col-lg-4 col-md-6">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <h4 class="card-title text-white">Model</h4>
                        <p class="card-text">{{$model_product->title}}</p>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
