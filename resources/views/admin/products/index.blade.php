@extends('admin.layout.master')

@push('page_title')
Məhsullar
@endpush
@push('section_title')
Məhsulların Siyahısı
@endpush

@section('content')
<div class="card mb-3">
    <div class="card-header p-4 border-bottom bg-body d-flex align-items-center justify-content-between my-3">
        <a class="btn btn-sm btn-phoenix-success" href="{{ route('admin.products.create') }}" role="button"
            aria-controls="basic-example-code"> Yenisini əlavə edin</a>
            <div class="ms-3" id="bulk-select-actions">
                <div class="d-flex">
                    <select class="form-select form-select-sm" aria-label="Bulk actions" id="bulk-action-select">
                        <option value="delete">Delete</option>
                    </select>
                    <button class="btn btn-phoenix-danger btn-sm ms-2" type="button" id="apply-bulk-action">Apply</button>
                </div>
            </div>
    </div>
    <div class="card-body">
        <div class="p-4 code-to-copy">
            <div id="tableExample3"
                data-list='{"valueNames":["id","title","category","brand"],"page":5,"pagination":true}'>
                <div class="search-box mb-3 mx-auto">
                    <form class="position-relative">
                        <input class="form-control search-input search form-control-sm" type="search"
                            placeholder="Axtarış" aria-label="Search">
                        <span class="fas fa-search search-box-icon"></span>
                    </form>
                </div>
                <div class="table-responsive">
                    <form id="bulk-delete-form" method="post" action="{{ route('admin.products.bulk-delete') }}">
                        @csrf
                        @method('delete')
                    <table class="table table-striped table-sm fs-9 mb-0">
                        <thead>
                            <tr>
                                <th class="white-space-nowrap border-top fs-9 align-middle ps-0" style="max-width:20px; width:18px;">
                                    <div class="form-check mb-0 fs-8">
                                        <input class="form-check-input" id="bulk-select-all" type="checkbox">
                                    </div>
                                </th>
                                <th class="sort border-top ps-3" data-sort="order">Order</th>
                                <th class="sort border-top ps-3" data-sort="id">İd</th>
                                <th class="sort border-top w-auto" data-sort="title">Başlıq</th>
                                <th class="sort border-top w-auto" data-sort="category">Kateqoriya</th>
                                <th class="sort border-top w-auto" data-sort="brand">Brend</th>
                                <th class="sort border-top w-auto">Şəkil</th>
                                <th class="sort text-end align-middle pe-0 border-top" scope="col">Fəaliyyətlər</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($products as $product)
                            <tr>
                                <td class="align-middle ps-3 order">{{ $product->order }}</td>
                                <td class="fs-9 align-middle">
                                    <div class="form-check mb-0 fs-8">
                                        <input class="form-check-input" type="checkbox" name="selected_ids[]" value="{{ $product->id }}">
                                    </div>
                                </td>
                                <td class="align-middle ps-3 id">{{ $product->id }}</td>
                                <td class="align-middle ps-3 title">
                                    {{ $product->title }}
                                </td>
                                <td class="align-middle ps-3 category">{{$product->category?->title}}</td>
                                <td class="align-middle ps-3 brand">{{$product->brand?->title}}</td>
                                <td class="align-middle title">
                                    @if ($product->image)
                                    <div class="image">
                                        <img src="{{ $product->image }}" alt="{{$product->title}}" class="img-fluid">
                                    </div>
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
                                                href="{{ route('admin.products.show', $product->id) }}"><span
                                                    data-feather="info">Göstər</span></a>
                                            <a class="dropdown-item"
                                                href="{{ route('admin.products.edit', $product->id) }}"><span
                                                    data-feather="edit">Redakte et</span></a>
                                            <div class="dropdown-divider"></div>
                                            <form action="{{ route('admin.products.destroy', $product->id) }}"
                                                onclick="return confirm('Əminsiniz?')" method="post">

                                                @method('delete')
                                                @csrf
                                                <button type="submit" style="width: fit-content;"
                                                    class="dropdown-item text-danger">
                                                    <span data-feather="delete">Sil</span></button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
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

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>



<script>
document.addEventListener('DOMContentLoaded', function() {
    const applyBulkActionBtn = document.getElementById('apply-bulk-action');
    const bulkSelectAllCheckbox = document.getElementById('bulk-select-all');

    if (applyBulkActionBtn) {
        applyBulkActionBtn.addEventListener('click', function() {
            var selectedAction = document.getElementById('bulk-action-select').value;
            if (selectedAction === 'delete') {
                var selectedIds = document.querySelectorAll('input[name="selected_ids[]"]:checked');
                if (selectedIds.length > 0) {
                    document.getElementById('bulk-delete-form').submit();
                } else {
                    alert('Please select at least one brand to delete.');
                }
            }
        });
    }

    if (bulkSelectAllCheckbox) {
        bulkSelectAllCheckbox.addEventListener('change', function() {
            var checkboxes = document.querySelectorAll('input[name="selected_ids[]"]');
            for (var checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
        });
    }

    const tbody = document.querySelector('tbody');
    if (tbody) {
        Sortable.create(tbody, {
            animation: 150,
            onEnd: function(evt) {
                const items = evt.from.children;
                const brands = [];

                for (let i = 0; i < items.length; i++) {
                    const dataId = items[i].querySelector('.id').innerText.trim();
                    brands.push({ id: dataId, order: i + 1 });
                }

                fetch(`{{ url('api/brands/changeOrder') }}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(brands)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('Order updated successfully.');
                    } else {
                        console.error('Error updating order:', data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        });
    }
});



</script>
