@extends('admin.layout.master')

@push('page_title')
Valve Kateqoriyalar
@endpush
@push('section_title')
Valve Kateqoriya Siyahısı
@endpush

@section('content')
<div class="card mb-3">
    <div class="card-header p-4 border-bottom bg-body">
        <a class="btn btn-sm btn-phoenix-success" href="{{route('admin.valve_categories.create')}}" role="button"
            aria-controls="basic-example-code"> Yenisini əlavə edin</a>
    </div>
    <div class="card-body">
        <div class="p-4 code-to-copy">
            <div id="tableExample3" data-list='{"valueNames":["id","slug","title"],"page":5,"pagination":true}'>
                <div class="search-box mb-3 mx-auto">
                    <form class="position-relative">
                        <input class="form-control search-input search form-control-sm" type="search"
                            placeholder="Axtarış" aria-label="Search">
                        <span class="fas fa-search search-box-icon"></span>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-sm fs-9 mb-0">
                        <thead>
                            <tr>
                                <th class="sort border-top border-translucent ps-3" data-sort="id">Id</th>
                                <th class="sort border-top" data-sort="slug">Slaq</th>
                                <th class="sort border-top w-auto" data-sort="title">Başlıq</th>
                                <th class="sort text-end align-middle pe-0 border-top" scope="col">Fəaliyyətlər</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($models as $model)
                            <tr>
                                <td class="align-middle ps-3 id">{{ $model->id }}</td>
                                <td class="align-middle slug">{{ $model->slug }}</td>
                                <td class="align-middle title">
                                    @php
                                    $titles = $model->title;
                                    @endphp
                                    @if (is_array($titles))
                                    @foreach ($titles as $lang => $title)
                                    <p class="m-0"><strong>{{ strtoupper($lang) }}:</strong> {{ $title }}</p>
                                    @endforeach
                                    @else
                                    <p class="m-0">{{ $model->title }}</p>
                                    @endif
                                </td>
                                <td class="align-middle white-space-nowrap text-end pe-0">
                                    <div class="btn-reveal-trigger position-static">
                                        <button
                                            class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10"
                                            type="button" data-bs-toggle="dropdown" data-boundary="window"
                                            aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                            <span class="fas fa-ellipsis-h fs-10"></span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end py-2">
                                            <a class="dropdown-item"
                                                href="{{ route('admin.valve_categories.show', $model->id) }}"><span
                                                    data-feather="info"></span></a>
                                            <a class="dropdown-item"
                                                href="{{ route('admin.valve_categories.edit', $model->id) }}"><span
                                                    data-feather="edit"></span></a>
                                            <div class="dropdown-divider"></div>
                                            <form action="{{ route('admin.valve_categories.destroy', $model->id) }}"
                                                onclick="return confirm('Əminsiniz?','Beli','Xeyir')" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" style="width: fit-content;"
                                                    class="dropdown-item text-danger">
                                                    <span data-feather="delete"></span></button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <span class="d-none d-sm-inline-block" data-list-info="data-list-info"></span>
                    <div class="d-flex">
                        <button class="page-link" data-list-pagination="prev">
                            <span class="fas fa-chevron-left"></span>
                        </button>
                        <ul class="mb-0 pagination"></ul>
                        <button class="page-link pe-0" data-list-pagination="next">
                            <span class="fas fa-chevron-right"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection