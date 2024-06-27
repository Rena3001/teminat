@extends('admin.layout.master')

@push('js')
<script>
window.addEventListener('load', function() {
    document.querySelector('.custom-file-image').addEventListener('change', function(event) {
        if (event.target.files[0]) {
            var tmppath = URL.createObjectURL(event.target.files[0]);
            document.querySelector('.image-box img').setAttribute("src", tmppath);
        } else {
            document.querySelector('.image-box img').setAttribute("src", '');
        }
    })
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
<form action="{{ route('admin.products.store') }}" method="POST" class="row mb-3" enctype="multipart/form-data">
    @csrf
    <div class="col-lg-7">


        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header border-bottom-0">
                <ul class="nav nav-underline fs-9" id="myTab" role="tablist">
                    @foreach ($langs as $key => $lang)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link {{ $key === 0 ? 'active' : '' }} @error('title.' . $lang->code)text-danger @enderror"
                            id="{{ $lang->code . 'slide' }}" data-bs-toggle="tab"
                            href="#{{ 'slide' . $lang->code }}" role="tab"
                            aria-controls="{{ 'slide' . $lang->code }}"
                            aria-selected="{{ $key === 0 ? 'true' : 'false' }}">{{ '[' . strtoupper($lang->code) . ']' }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content mt-3" id="myTabContent">
                    @foreach ($langs as $key => $lang)
                    <div class="tab-pane fade {{ $key === 0 ? 'active show' : '' }}"
                        id="{{ 'slide' . $lang->code }}" role="tabpanel"
                        aria-labelledby="{{ $lang->code . 'slide' }}">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="title_{{ $lang->code }}">Başlıq {{ strtoupper($lang->code) }}</label>
                                <input type="text"
                                    class="form-control @error('title.' . $lang->code)is-invalid @enderror"
                                    id="title_{{ $lang->code }}" name="title[{{ $lang->code }}]"
                                    value="{{ old('title.' . $lang->code) }}">
                                @error('title.' . $lang->code)
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>



                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="pdf_file_">File</label>
                    <input type="file"
                        class="form-control "
                        id="" name="pdf_file"
                        value="{{ old('pdf_file') }}">
                    @error('pdf_file' )
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category_id">Select Category:</label>
                    <select class="custom-select form-control-border" id="category_id" name="category_id"
                        value="">
                        <option value="">Valve Category</option>
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

                <div class="form-group d-flex">
                    <label for="image">Şəkil</label>
                    <input type="file" name="image"
                        class="custom-file-image form-control @error('image') is-invalid @enderror" id="image"
                        value="{{ old('image') }}">
                    @error('image')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success">Əlavə et</button>
                    <a href="{{route('admin.products.index')}}" class="btn btn-warning">Ləğv et</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="image-box">
            <img src="" alt="" class="img-fluid">
        </div>
    </div>
</form>
@endsection
