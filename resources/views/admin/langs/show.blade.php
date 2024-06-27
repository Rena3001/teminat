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
        <h3 class="card-title d-flex justify-content-between align-items-center">Ətraflı <a
                href="{{route('admin.langs.index')}}" class="btn btn-warning">Geri qayıt</a></h3>

    </div>
    <div class="card-body">
        <div class="row" style="gap: 20px;">
            <!-- @foreach ($model->getFillable() as $field)
            @if (is_array($model->getAttribute($field)))
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @foreach ($model->getAttribute($field) as $key=>$value)
                            <div class="col-sm-4">
                                <div class="position-relative p-3 bg-gray" style="height: 180px">
                                    <div class="ribbon-wrapper ribbon-xl">
                                        <div class="ribbon bg-warning text-lg">
                                            {{$key}}
                                        </div>
                                    </div>
                                    {{$value}}
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="col-sm-6">
                <div class="callout callout-info">
                    <h5 class="text-info">{{ ucfirst(str_replace('_', ' ', $field)) }}</h5>
                    <p>
                        {{$model->getAttribute($field)}}
                    </p>
                </div>
            </div>
            @endif
            @endforeach -->

            <div class="col-lg-4 col-md-6">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <h4 class="card-title text-white">Dil</h4>
                        <p class="card-text">{{$model->language}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <h4 class="card-title text-white">Dilin Kodu</h4>
                        <p class="card-text">{{$model->code}}</p>
                    </div>
                </div>
            </div>
            @if ($model->image)
            <div class="col-lg-4 col-md-6">
                <div class="card border border-info">
                    <div class="card-body">
                        <img class="img-fluid" src="{{$model->image}}" alt="">
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection