@extends('admin.layout.master')

@push('page_title')
Məhsul yeniləmə
@endpush
@push('section_title')
Məhsul Redaktə Etmə
@endpush

@section('content')
<form action="{{ route('admin.products.update', $product->id) }}" method="POST" class="row mb-3" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="col-lg-8">
        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                    @foreach ($langs as $key => $lang)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link {{ $key === 0 ? 'active' : '' }} @error('title.' . $lang->code)text-danger @enderror"
                            id="{{ $lang->code . 'products' }}" data-bs-toggle="tab"
                            href="#{{ 'products' . $lang->code }}" role="tab"
                            aria-controls="{{ 'products' . $lang->code }}"
                            aria-selected="{{ $key === 0 ? 'true' : 'false' }}">{{ '[' . strtoupper($lang->code) . ']' }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">

                    @foreach ($langs as $key => $lang)
                    <div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}"
                        id="{{ 'products' . $lang->code }}" role="tabpanel"
                        aria-labelledby="custom-tabs-four-home-tab">

                        <div class="card-body">
                            <div class="form-group">
                                <label for="title.{{ $lang->code }}">Başlıq</label>
                                <input type="text"
                                    class="form-control @error('title.' . $lang->code)is-invalid @enderror"
                                    id="title.{{ $lang->code }}" name="title[{{ $lang->code }}]"
                                    value="{{ old('title' . '.' . $lang->code, isset($product->json_field[$lang->code]) ? $product->json_field[$lang->code] : '') }}">
                                @error('title.' . $lang->code)
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Yadda Saxla</button>
                        <a href="{{route('admin.products.index')}}" class="btn btn-warning">Ləğv et</a>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="form-group">
            <label for="category_id">Select Category:</label>
            <select class="custom-select form-control-border" id="category_id" name="category_id"
                value="{{old('category_id', $product->category_id)}}">
                <option value="">Category</option>
                @foreach ($categories as $category)
                <option @selected((int)old('category_id', $product->category_id)===$category->id)
                    value="{{$category->id}}"
                    >{{$category->title}}</option>
                @endforeach
            </select>
            @error('category_id')
            <span class="text-danger ml-2">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="pdf_file">PDF File</label>
            <input type="file" class="form-control @error('pdf_file') is-invalid @enderror" id="pdf_file" name="pdf_file">
            @error('pdf_file')
            <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="image">Şəkil</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
            @error('image')
            <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        @if($product->image)
        <div class="image-box mt-3">
            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="img-fluid">
        </div>
        @endif
    </div>
</form>
@endsection
