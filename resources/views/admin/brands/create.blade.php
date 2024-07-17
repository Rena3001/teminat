@extends('admin.layout.master')

@push('page_title')
Yeni Brend
@endpush
@push('section_title')
Brend Əlavə Etmə
@endpush

@push('js')

<script>
window.addEventListener('load', function() {
    document.querySelector('.custom-file-image').addEventListener('change', function(event) {
        if (event.target.files[0]) {
            var tmppath = URL.createObjectURL(event.target.files[0]);
            document.querySelector('.image-box img').setAttribute("src",
                URL.createObjectURL(event.target.files[0]));
        } else {
            document.querySelector('.image-box img').setAttribute("src", '');
        }
    })
});
</script>
@endpush
@section('content')

<form action="{{ route('admin.brands.store') }}" method="POST" class="row mb-3" enctype="multipart/form-data">
    @csrf
    <div class="col-lg-7">
        <div class="card card-primary">
            <div class="card-body">
                <div class="form-group d-flex">
                    <label for="title">Başlıq</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title"
                        value="{{ old('title') }}">
                    @error('title')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group d-flex">
                    <label class="m-0" for="image">Şəkil</label>
                    <input type="file" name="image"
                        class="custom-file-image form-control @error('image') is-invalid @enderror" id="image"
                        value="image">
                    @error('image')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success">Əlavə et</button>
                    <a href="{{route('admin.brands.index')}}" class="btn btn-warning">Ləğv et</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="image-box bg-light-gray">
            <img src="" alt="" class="img-fluid">
        </div>
    </div>
</form>


@endsection
