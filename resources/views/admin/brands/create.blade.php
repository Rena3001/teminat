@extends('admin.layout.master')

@push('page_title')
Yeni Brend
@endpush
@push('section_title')
Brend Əlavə Etmə
@endpush

@section('content')

<form action="{{ route('admin.brands.store') }}" method="POST" class="row mb-3">
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
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success">Əlavə et</button>
                    <a href="{{route('admin.brands.index')}}" class="btn btn-warning">Ləğv et</a>
                </div>
            </div>
        </div>
    </div>
</form>


@endsection