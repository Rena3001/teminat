@extends('admin.layout.master')

@push('page_title')
"Əlaqələr"
@endpush
@push('section_title')
"Əlaqələrin məlumatları"
@endpush

@section('content')
<main class="main" id="top">
  <!-- Your existing script here -->

  <div class="content">
    <nav class="mb-2" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="#!">Pages</a></li>
        <li class="breadcrumb-item active">Members</li>
      </ol>
    </nav>
    <h2 class="text-bold text-body-emphasis mb-5">Members</h2>
    <div id="members" data-list='{"valueNames":["customer","email","mobile_number","city","last_active","joined"],"page":10,"pagination":true}'>
      <div class="row align-items-center justify-content-between g-3 mb-4">
        <div class="col col-auto">
          <div class="search-box">
            <form class="position-relative">
              <input class="form-control search-input search" type="search" placeholder="Search members" aria-label="Search">
              <span class="fas fa-search search-box-icon"></span>
            </form>
          </div>
        </div>
        <div class="col-auto">

        </div>
      </div>
      <div class="mx-n4 mx-lg-n6 px-4 px-lg-6 mb-9 bg-body-emphasis border-y mt-2 position-relative top-1">
        <div class="table-responsive scrollbar ms-n1 ps-1">
          <table class="table table-sm fs-9 mb-0">
            <thead>
              <tr>
                <th class="white-space-nowrap fs-9 align-middle ps-0">
                  <div class="form-check mb-0 fs-8">
                    <input class="form-check-input" id="checkbox-bulk-members-select" type="checkbox" data-bulk-select='{"body":"members-table-body"}'>
                  </div>
                </th>
                <th class="sort align-middle" scope="col" data-sort="customer" style="width:15%; min-width:200px;">CUSTOMER</th>
                <th class="sort align-middle" scope="col" data-sort="email" style="width:15%; min-width:200px;">EMAIL</th>
                <th class="sort align-middle pe-3" scope="col" data-sort="mobile_number" style="width:20%; min-width:200px;">MOBILE NUMBER</th>
                <th class="sort align-middle" scope="col" data-sort="city" style="width:10%;">CITY</th>
                <th class="sort align-middle text-end pe-0" scope="col" data-sort="joined" style="width:19%;  min-width:200px;">CREATED</th>
                <th class="sort align-middle text-end pe-0" scope="col" data-sort="joined" style="width:19%;  min-width:200px;">SHOW</th>
              </tr>
            </thead>
            <tbody class="list" id="members-table-body">
              @foreach($contacts as $contact)
              <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                <td class="fs-9 align-middle ps-0 py-3">
                  <div class="form-check mb-0 fs-8">
                    <input class="form-check-input" type="checkbox" data-bulk-select-row='{"customer":{"avatar":"/team/32.webp","name":"Carry Anna"},"email":"annac34@gmail.com","mobile":"+912346578","city":"Budapest","lastActive":"34 min ago","joined":"Dec 12, 12:56 PM"}'>
                  </div>
                </td>
                <td class="customer align-middle white-space-nowrap">
                  <a class="d-flex align-items-center text-body text-hover-1000" href="#!">
                    <div class="fullname avatar-m">
                      <img class="rounded-circle" src="../assets/img/team/32.webp" alt="">
                    </div>
                    <h6 class="mb-0 ms-3 fw-semibold">{{ $contact->fullname }}</h6>
                  </a>
                </td>
                <td class="email align-middle white-space-nowrap">
                  <a class="fw-semibold" href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                </td>

                <td class="phone align-middle white-space-nowrap">
                  <a class="fw-bold text-body-emphasis" href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>
                </td>
                <td class="message align-middle white-space-nowrap text-body">{{ $contact->city }}</td>
                <td class="joined align-middle white-space-nowrap text-body-tertiary text-end">{{ $contact->created_at }}</td>
                <td class="align-middle white-space-nowrap text-end pe-0">
                  <div class="btn-reveal-trigger position-static">
                    <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                      <span class="fas fa-ellipsis-h fs-10"></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end py-2">
                      <a class="dropdown-item" href="{{ route('admin.contacts.show', $contact->id) }}">
                        <span data-feather="info">Göstər</span>
                      </a>
                      <div class="dropdown-divider"></div>
                      <form action="{{ route('admin.contacts.destroy', $contact->id) }}" onclick="return confirm('Əminsiniz?')" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" style="width: fit-content;" class="dropdown-item text-danger">
                          <span data-feather="delete">Sil</span>
                        </button>
                      </form>
                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="row align-items-center justify-content-between py-2 pe-0 fs-9">
          <div class="col-auto d-flex">
            <p class="mb-0 d-none d-sm-block me-3 fw-semibold text-body" data-list-info="data-list-info"></p>
            <a class="fw-semibold" href="#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
            <a class="fw-semibold d-none" href="#!" data-list-view="less">View Less<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
          </div>
          <div class="col-auto d-flex">
            <button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
            <ul class="mb-0 pagination"></ul>
            <button class="page-link pe-0" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
