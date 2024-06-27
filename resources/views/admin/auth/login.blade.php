@extends('admin.auth.layouts.master')
@push('title')
EAP - Daxil olma
@endpush
@section('content')
@if (session()->has('login'))
<p class="login-box-msg text-danger">{{ session('login') }}</p>
@endif

<div class="container">
    <div class="row flex-center min-vh-100 py-5">
        <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3"><a
                class="d-flex flex-center text-decoration-none mb-4" href="../../../index-1.html">
                <div class="d-flex align-items-center fw-bolder fs-3 d-inline-block"><img class="logo_img"
                        src="{{asset('admin/assets/img/elektrod_admin_logo_light.svg')}}" alt="phoenix" width="150">
                </div>
            </a>
            <div class="text-center mb-7">
                <h3 class="text-body-highlight">Giriş</h3>
            </div>
            <div class="position-relative">
                <hr class="bg-body-secondary mt-5 mb-4">
                <div class="divider-content-center"> e-mail istifadə edin</div>
            </div>
            <form action="{{ route('login_login') }}" method="post">
                @csrf
                <div class="mb-3 text-start"><label class="form-label" for="email">E-mail adresiniz</label>
                    <div class="form-icon-container @error('email') is-invalid @enderror"><input
                            class="form-control form-icon-input" name="email" value="{{ old('email') }}" id="email"
                            type="email" placeholder="E-poçt adresi" required autocomplete="email" autofocus><span
                            class="fas fa-user text-body fs-9 form-icon"></span>
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3 text-start"><label class="form-label" for="password">Şifrəniz</label>
                    <div class="form-icon-container  @error('password') is-invalid @enderror"><input
                            class="form-control form-icon-input" id="password" type="password" name="password"
                            placeholder="Şifrə" required autocomplete="current-password"><span
                            class="fas fa-key text-body fs-9 form-icon"></span></div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row flex-between-center mb-7">
                    <div class="col-auto">
                        <div class="form-check mb-0"><input class="form-check-input" id="basic-checkbox" type="checkbox"
                                name="remember" {{ old('remember') ? 'checked' : '' }} checked="checked"><label
                                class="form-check-label mb-0" for="basic-checkbox">Məni yadda saxla</label></div>
                    </div>

                </div><button class="btn btn-primary w-100 mb-3">Daxil ol</button>
            </form>
        </div>
    </div>
</div>
@endsection