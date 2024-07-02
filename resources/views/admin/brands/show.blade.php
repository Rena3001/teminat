@extends('admin.layout.master')

@push('page_title')
Brend Məlumatları
@endpush
@push('section_title')
Brendin Ətraflı Məlumatları
@endpush

@section('content')
<div class="card card-primary  mb-3">
    <div class="card-header">
        <h3 class="card-title d-flex justify-content-between align-items-center">Ətraflı <a
                href="{{route('admin.brands.index')}}" class="btn btn-warning">Geri qayıt</a></h3>

    </div>
    <div class="card-body">
        <div class="row" style="gap: 20px;">
            <div class="card border border-success w-fit">
                <div class="card-body">
                    <h4 class="card-title text-warning">Başlıq</h4>
                    <p class="card-text"><strong class="me-3 text-info">{{$model->title}}</strong>
                    </p>
                </div>
            </div>
            <div class="card border border-success w-fit">
                <div class="card-body">
                    <h4 class="card-title text-warning">Yaranma tarixi</h4>
                    <p class="card-text"><strong class="me-3 text-info">{{$model->created_at}}</strong>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection