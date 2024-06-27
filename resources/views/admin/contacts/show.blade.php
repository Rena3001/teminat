@extends('admin.layout.master')

@push('page_title')
"Əlaqə" Məlumatları
@endpush
@push('section_title')
Əlaqənin Ətraflı Məlumatları
@endpush

@section('content')
<div class="card card-primary mb-3">
    <div class="card-header">
        <h3 class="card-title d-flex justify-content-between align-items-center">Ətraflı <a
                href="{{route('admin.show.index')}}" class="btn btn-warning">Geri qayıt</a></h3>
    </div>
    <div class="card-body">
        <div class="row" style="gap: 20px;">
            <div class="col-md-12">
                <div class="card border border-success w-fit">
                    <div class="card-body">
                        <h4 class="card-title text-warning">Ad</h4>
                        <p class="card-text"><strong class="me-3 text-info"></strong>{{ $value }}</p>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title text-warning">Email</h4>
                        <p class="card-text"><strong class="me-3 text-info"></strong>{{ $value }}</p>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title text-warning">Nömrə</h4>
                        <p class="card-text"><strong class="me-3 text-info"></strong>{{ $value }}</p>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title text-warning">Mesaj</h4>
                        <p class="card-text"><strong class="me-3 text-info"></strong>{{ $value }}</p>
                    </div>

                </div>
                <div class="card border border-success w-fit">

            </div>

        </div>
    </div>
</div>
@endsection
