@extends('admin.layout.master')

@push('page_title')
Valve Kateqoriya yeniləmə
@endpush
@push('section_title')
Valve Kateqoriya Redaktə Etmə
@endpush

@section('content')
<form action="{{ route('admin.valve_categories.update', $model->id) }}" method="POST" class="row mb-3">
    @csrf
    @method('PATCH')
    <div class="col-lg-8">
        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
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
                <div class="tab-content" id="custom-tabs-four-tabContent">
                    @foreach ($langs as $key => $lang)
                    <div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}"
                        id="{{ 'valve_categories' . $lang->code }}" role="tabpanel"
                        aria-labelledby="custom-tabs-four-home-tab">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title.{{ $lang->code }}">Başlıq</label>
                                <input type="text"
                                    class="form-control @error('title.' . $lang->code)is-invalid @enderror"
                                    id="title.{{ $lang->code }}" name="title[{{ $lang->code }}]"
                                    value="{{ old('title' . '.' . $lang->code, isset($model->json_field[$lang->code]) ? $model->json_field[$lang->code] : '') }}">
                                @error('title.' . $lang->code)
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Yadda Saxla</button>
                        <a href="{{route('admin.valve_categories.index')}}" class="btn btn-warning">Ləğv et</a>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</form>
@endsection