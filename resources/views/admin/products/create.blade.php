@extends('admin.layout.master')

@push('css')
<link href="{{asset('admin/assets/vendors/choices/choices.min.css')}}" rel="stylesheet">
@endpush
@push('js')
<script src="{{asset('admin/assets/vendors/choices/choices.min.js')}}"></script>
<script>
window.addEventListener('load', function() {
    const boxImage = document.querySelector('.image-box');
    boxImage.classList.add('d-none');

    document.querySelector('.custom-file-image').addEventListener('change', function(event) {
        if (event.target.files[0]) {
            var tmppath = URL.createObjectURL(event.target.files[0]);
            document.querySelector('.image-box img').setAttribute("src", tmppath);
            boxImage.classList.remove('d-none');
        } else {
            document.querySelector('.image-box img').setAttribute("src", '');
            boxImage.classList.add('d-none');
        }
    });

    const boxPdf = document.querySelector('.pdf-box');
    boxPdf.classList.add('d-none');

    document.querySelector('.custom-file-pdf').addEventListener('change', function(event) {
        if (event.target.files[0]) {
            var tmppath = URL.createObjectURL(event.target.files[0]);
            document.querySelector('.pdf-box embed').setAttribute("src", tmppath);
            boxPdf.classList.remove('d-none');
        } else {
            document.querySelector('.pdf-box embed').setAttribute("src", '');
            boxPdf.classList.add('d-none');
        }
    });
});
</script>
@endpush

@push('page_title')
Yeni Mehsul
@endpush
@push('section_title')
Mehsul Əlavə Etmə
@endpush

@section('content')
<form action="{{ route('admin.products.store') }}" method="POST" class="row mb-3" enctype="multipart/form-data"
    style="row-gap: 20px;">
    @csrf
    <div class="col-lg-7">
        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header border-bottom-0">
                <ul class="nav nav-underline fs-9" id="myTab" role="tablist">
                    @foreach ($langs as $key => $lang)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link {{ $key === 0 ? 'active' : '' }} @error('title.' . $lang->code)text-danger @enderror"
                            id="{{ $lang->code . 'slide' }}" data-bs-toggle="tab" href="#{{ 'slide' . $lang->code }}"
                            role="tab" aria-controls="{{ 'slide' . $lang->code }}"
                            aria-selected="{{ $key === 0 ? 'true' : 'false' }}">{{ '[' . strtoupper($lang->code) . ']' }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="card-body pt-0">
                <div class="tab-content mt-3" id="myTabContent">
                    @foreach ($langs as $key => $lang)
                    <div class="tab-pane fade {{ $key === 0 ? 'active show' : '' }}" id="{{ 'slide' . $lang->code }}"
                        role="tabpanel" aria-labelledby="{{ $lang->code . 'slide' }}">
                        <div class="form-group">
                            <label for="title_{{ $lang->code }}" class="m-0">Başlıq
                                {{ strtoupper($lang->code) }}</label>
                            <input type="text" class="form-control @error('title.' . $lang->code)is-invalid @enderror"
                                id="title_{{ $lang->code }}" name="title[{{ $lang->code }}]"
                                value="{{ old('title.' . $lang->code) }}">
                            @error('title.' . $lang->code)
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="pdf_file">Pdf faylı</label>
                    <input type="file" class="custom-file-pdf form-control " id="pdf_file" name="pdf_file"
                        value="{{ old('pdf_file') }}" accept="application/pdf,application/vnd.ms-excel">
                    @error('pdf_file' )
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group d-flex">
                    <label for="image">Şəkil</label>
                    <input type="file" name="image"
                        class="custom-file-image form-control @error('image') is-invalid @enderror" id="image"
                        value="{{ old('image') }}" accept="image/*">
                    @error('image')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group d-block">
                    <label for="category_id">Kateqoriya seçin:</label>
                    <select class="form-select" id="category_id" name="category_id" value="{{old('category_id')}}"
                        data-choices="data-choices" data-options='{"removeItemButton":true,"placeholder":true}'>
                        <option value="0">Kateqoriyalar</option>
                        @foreach ($categories as $category)
                        <option @selected((int)old('category_id')===$category->id)
                            value="{{$category->id}}"
                            >{{$category->title}}</option>
                        @error('category_id')
                        <span class="text-danger ml-2">{{$message}}</span>
                        @enderror
                        @endforeach
                    </select>
                </div>
                <div class="form-group d-block">
                    <label for="brand_id">Brend seçin:</label>
                    <select class="form-select" id="brand_id" name="brand_id" value="{{old('brand_id')}}"
                        data-choices="data-choices" data-options='{"removeItemButton":true,"placeholder":true}'>
                        <option value="0">Brendlər</option>
                        @foreach ($brands as $brand)
                        <option @selected((int)old('brand_id')===$brand->id)
                            value="{{$brand->id}}"
                            >{{$brand->title}}</option>
                        @error('brand_id')
                        <span class="text-danger ml-2">{{$message}}</span>
                        @enderror
                        @endforeach
                    </select>
                </div>

                <div class="card-footer text-right mt-3">
                    <button type="submit" class="btn btn-success">Əlavə et</button>
                    <a href="{{route('admin.products.index')}}" class="btn btn-warning">Ləğv et</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="image-box box_item">
            <img src="" alt="" class="img-fluid">
        </div>
    </div>
    <div class="col-lg-7">
        <div class="pdf-box box_item">
            <embed src="" width="800px" height="800px" />
        </div>
    </div>
</form>
@endsection