@extends('admin.layout.master')

@push('page_title')
Yeni Model
@endpush
@push('section_title')
Model Əlavə Etmə
@endpush

@section('content')
<form action="{{ route('admin.model_products.store') }}" method="POST" class="row mb-3" enctype="multipart/form-data" style="row-gap: 20px;">
    @csrf
    <div class="col-lg-7">
        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header border-bottom-0">
                <ul class="nav nav-underline fs-9" id="myTab" role="tablist">

                    <li class="nav-item" role="presentation">
                        <a class="nav-link  @error('title.' )text-danger @enderror" id="{{  'slide' }}" data-bs-toggle="tab" href="#{{ 'slide'  }}" role="tab" aria-controls="{{ 'slide'  }}" ></a>
                    </li>
                </ul>
            </div>
            <div class="card-body pt-0">
                <div class="tab-content mt-3" id="myTabContent">

                    <div class="form-group">
                        <label for="title" class="m-0">Başlıq
                            </label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title' ) }}">
                        @error('title')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="card">
            <div class="card-body">
                <div class="card-footer text-right mt-3">
                    <button type="submit" class="btn btn-success">Əlavə et</button>
                    <a href="{{route('admin.model_products.index')}}" class="btn btn-warning">Ləğv et</a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
