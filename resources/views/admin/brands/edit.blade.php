@extends('admin.layout.master')

@push('page_title')
Brend yeniləmə
@endpush
@push('section_title')
Brend Redaktə Etmə
@endpush

@section('content')
<form action="{{ route('admin.brands.update', $model->id) }}" method="POST" class="row mb-3">
    @csrf
    @method('PATCH')
    <div class="col-lg-7">
        <div class="card card-primary">
            <div class="card-body">
                <div class="form-group d-flex">
                    <label for="title">Başlıq</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title"
                        value="{{ old('title', $model->title) }}">
                    @error('title')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Yadda Saxla</button>
                    <a href="{{route('admin.brands.index')}}" class="btn btn-warning">Ləğv et</a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection