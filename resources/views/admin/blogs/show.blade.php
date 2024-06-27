@extends('admin.layout.master')

@push('page_title')
Bloqun Məlumatları
@endpush
@push('section_title')
Bloq Ətraflı Məlumatları
@endpush

@section('content')
<div class="card card-primary  mb-3">
    <div class="card-header">
        <h3 class="card-title d-flex justify-content-between align-items-center">Ətraflı <a
                href="{{route('admin.blog.index')}}" class="btn btn-warning">Geri qayıt</a></h3>

    </div>
    <div class="card-body">
        <div class="row" style="gap: 20px;">
            <div class="col-md-12">
                <div class="card border border-success w-fit">
                    <div class="card-body">
                        <h4 class="card-title text-warning">Başlıq</h4>
                        @foreach ($model->titles as $lang=>$value)
                        <p class="card-text"><strong class="me-3 text-info">{{strtoupper($lang)}}</strong>{{$value}}
                        </p>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card border border-success w-fit">
                    <div class="card-body">
                        <h4 class="card-title text-warning">Slaq</h4>
                        @foreach ($model->slugs as $lang=>$value)
                        <p class="card-text"><strong class="me-3 text-info">{{strtoupper($lang)}}</strong>{{$value}}
                        </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
