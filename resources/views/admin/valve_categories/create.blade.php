@extends('admin.layout.master')

@push('page_title')
Yeni Valve Kateqoriya
@endpush
@push('section_title')
Valve Kateqoriya Əlavə Etmə
@endpush

@section('content')

<form action="{{ route('admin.valve_categories.store') }}" method="POST" class="row mb-3">
    @csrf
    <div class="col-lg-8">
        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header border-bottom-0">
                <ul class="nav nav-underline fs-9" id="myTab" role="tablist">
                    @foreach ($langs as $key => $lang)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link {{ $key === 0 ? 'active' : '' }} @error('title.' . $lang->code)text-danger @enderror"
                            id="{{ $lang->code . 'valve_categories' }}" data-bs-toggle="tab"
                            href="#{{ 'valve_categories' . $lang->code }}" role="tab"
                            aria-controls="{{ 'valve_categories' . $lang->code }}"
                            aria-selected="{{ $key === 0 ? 'true' : 'false' }}">{{ '[' . strtoupper($lang->code) . ']' }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content mt-3" id="myTabContent">
                    @foreach ($langs as $key => $lang)
                    <div class="tab-pane fade {{ $key === 0 ? 'active show' : '' }}"
                        id="{{ 'valve_categories' . $lang->code }}" role="tabpanel"
                        aria-labelledby="{{ $lang->code . 'valve_categories' }}">
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
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success">Əlavə et</button>
                    <a href="{{route('admin.valve_categories.index')}}" class="btn btn-warning">Ləğv et</a>
                </div>
            </div>
        </div>
    </div>
</form>


@endsection