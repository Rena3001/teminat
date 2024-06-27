@extends('admin.layout.master')
@php
$images = json_encode($settings->images);
@endphp
@push('js')
<script>
window.addEventListener('load', function() {

    const settingsFields = <?= $images ?>;
    const defaultImages = '<?= asset('admin/assets/img/elektrod_logo.svg') ?>';
    Object.keys(settingsFields).forEach(function(id) {
        const imgElement = document.querySelector(`img.${id}`);
        if (imgElement && settingsFields[id] !== '#' && settingsFields[id].trim()) {
            imgElement.setAttribute("src", settingsFields[id]);
        }
    });

    document.querySelectorAll('.custom-file-image').forEach(function(inputElement) {
        inputElement.addEventListener('change', function(event) {
            const id = inputElement.id;
            const imgElement = document.querySelector(`img.${id}`);

            if (event.target.files[0] && imgElement) {
                var tmppath = URL.createObjectURL(event.target.files[0]);
                imgElement.setAttribute("src", tmppath);
            } else if (imgElement) {
                imgElement.setAttribute("src", settingsFields[id].trim() && settingsFields[
                        id] !==
                    '#' ? settingsFields[id] : defaultImages);
            }
        });
    });

    $('textarea').summernote();
});
</script>
@endpush

@push('page_title')
Saytın Ümumi Məlumatlarını Yenileme
@endpush
@push('section_title')
Saytın Ümumi Məlumatlarını Redaktə Etmə
@endpush

@section('content')


<div class="d-flex justify-content-end my-3">
    <a href="{{route('admin.settings')}}" class="btn btn-primary">Geri Qayıt</a>
</div>

<div class="card card-primary  mb-3">
    <form action="{{ route('admin.settings.update') }}" method="POST" class="" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="card-header d-flex justify-content-between">Form Məlumatları
            <div class="text-right">
                <button type="submit" class="btn btn-success">Yadda saxla</button>
                <a href="{{route('admin.settings')}}" class="btn btn-warning">Ləğv et</a>
            </div>
        </div>
        <div class="card-header">Tərcüməsiz sahələr </div>
        <div class="card-body row mb-3">
            <div class="col-lg-7 mb-4">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="form-group d-block">
                            <label for="fb">Facebook Linki</label>
                            <input type="text" name="fb" class="form-control @error('fb') is-invalid @enderror" id="fb"
                                value="{{ old('fb', $settings->fb) }}">
                            @error('fb')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group d-block">
                            <label for="tw">Twitter Linki</label>
                            <input type="text" name="tw" class="form-control @error('tw') is-invalid @enderror" id="tw"
                                value="{{ old('tw', $settings->tw) }}">
                            @error('tw')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group d-block">
                            <label for="in">Linkedin Linki</label>
                            <input type="text" name="in" class="form-control @error('in') is-invalid @enderror" id="in"
                                value="{{ old('in', $settings->in) }}">
                            @error('in')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group d-block">
                            <label for="inst">Instagram Linki</label>
                            <input type="text" name="inst" class="form-control @error('inst') is-invalid @enderror"
                                id="inst" value="{{ old('inst', $settings->inst) }}">
                            @error('inst')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group d-block">
                            <label for="yt">Youtube Linki</label>
                            <input type="text" name="yt" class="form-control @error('yt') is-invalid @enderror" id="yt"
                                value="{{ old('yt', $settings->yt) }}">
                            @error('yt')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group d-block">
                            <label for="address">Ünvan</label>
                            <input type="text" name="address"
                                class="form-control @error('address') is-invalid @enderror" id="address"
                                value="{{ old('address', $settings->address) }}">
                            @error('address')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group d-block">
                            <label for="phone">Telefon Nömrəsi</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                id="phone" value="{{ old('phone', $settings->phone) }}">
                            @error('phone')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group d-block">
                            <label for="fax">Faks Nömrəsi</label>
                            <input type="text" name="fax" class="form-control @error('fax') is-invalid @enderror"
                                id="fax" value="{{ old('fax', $settings->fax) }}">
                            @error('fax')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group d-block">
                            <label for="email">E-poçt Ünvanı</label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" value="{{ old('email', $settings->email) }}">
                            @error('email')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group d-block">
                            <label for="about_iframe">Haqqımızda Səhifəsinin Youtube Linki</label>
                            <input type="text" name="about_iframe"
                                class="form-control @error('about_iframe') is-invalid @enderror" id="about_iframe"
                                value="{{ old('about_iframe', $settings->about_iframe) }}">
                            @error('about_iframe')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">Şəkillər sahəsi</div>
        <div class="card-body row mb-3">
            <div class="col-lg-4 col-md-6">
                <div class="form-group d-block">
                    <label for="image_logo_light">Açıq rəngli tema üçün Logo</label>
                    <input type="file" name="image_logo_light"
                        class="custom-file-image form-control @error('image_logo_light') is-invalid @enderror"
                        id="image_logo_light" value="{{ old('image_logo_light') }}">
                    @error('image_logo_light')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="image-box">
                            <img src="{{$settings->image_logo_light != '#' ? $settings->image_logo_light : asset('admin/assets/img/elektrod_logo.svg')}}"
                                alt="" class="img-fluid image_logo_light">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="form-group d-block">
                    <label for="image_logo_dark">Tünd rəngli tema üçün Logo</label>
                    <input type="file" name="image_logo_dark"
                        class="custom-file-image form-control @error('image_logo_dark') is-invalid @enderror"
                        id="image_logo_dark" value="{{ old('image_logo_dark') }}">
                    @error('image_logo_dark')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="image-box">
                            <img src="{{$settings->image_logo_dark != '#' ? $settings->image_logo_dark : asset('admin/assets/img/elektrod_logo.svg')}}"
                                alt="" class="img-fluid image_logo_dark">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="form-group d-block">
                    <label for="about_banner">Haqqımızda Səhifəsinin Banner Şəkli</label>
                    <input type="file" name="about_banner"
                        class="custom-file-image form-control @error('about_banner') is-invalid @enderror"
                        id="about_banner" value="{{ old('about_banner') }}">
                    @error('about_banner')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="image-box">
                            <img src="{{$settings->about_banner != '#' ? $settings->about_banner : asset('admin/assets/img/elektrod_logo.svg')}}"
                                alt="" class="img-fluid about_banner">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="form-group d-block">
                    <label for="contact_image">Əlaqə Səhifəsinin Şəkli</label>
                    <input type="file" name="contact_image"
                        class="custom-file-image form-control @error('contact_image') is-invalid @enderror"
                        id="contact_image" value="{{ old('contact_image') }}">
                    @error('contact_image')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="image-box">
                            <img src="{{$settings->contact_image != '#' ? $settings->contact_image : asset('admin/assets/img/elektrod_logo.svg')}}"
                                alt="" class="img-fluid contact_image">
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-6">
                <div class="form-group d-block">
                    <label for="welding_image">Welding Ana səhifədəki Şəkli</label>
                    <input type="file" name="welding_image"
                        class="custom-file-image form-control @error('welding_image') is-invalid @enderror"
                        id="welding_image" value="{{ old('welding_image') }}">
                    @error('welding_image')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="image-box">
                            <img src="{{$settings->welding_image != '#' ? $settings->welding_image : asset('admin/assets/img/elektrod_logo.svg')}}"
                                alt="" class="img-fluid welding_image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="form-group d-block">
                    <label for="casting_image">Casting Ana səhifədəki Şəkli</label>
                    <input type="file" name="casting_image"
                        class="custom-file-image form-control @error('casting_image') is-invalid @enderror"
                        id="casting_image" value="{{ old('casting_image') }}">
                    @error('casting_image')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="image-box">
                            <img src="{{$settings->casting_image != '#' ? $settings->casting_image : asset('admin/assets/img/elektrod_logo.svg')}}"
                                alt="" class="img-fluid casting_image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="form-group d-block">
                    <label for="valve_image">Valve Ana səhifədəki Şəkli</label>
                    <input type="file" name="valve_image"
                        class="custom-file-image form-control @error('valve_image') is-invalid @enderror"
                        id="valve_image" value="{{ old('valve_image') }}">
                    @error('valve_image')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="image-box">
                            <img src="{{$settings->valve_image != '#' ? $settings->valve_image : asset('admin/assets/img/elektrod_logo.svg')}}"
                                alt="" class="img-fluid valve_image">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header">Tərcümə olunan sahələr</div>
        <div class="card-body row mb-3" style="row-gap: 20px;">
            <div class="col-md-5 col-12">
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-header p-3 py-2">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            @foreach ($langs as $key => $lang)
                            <li class="nav-item" role="presentation">
                                <a class="nav-link {{ $key === 0 ? 'active' : '' }} @error('home_about_title.' . $lang->code)text-danger @enderror"
                                    id="{{ $lang->code . 'home_about_title' }}" data-bs-toggle="tab"
                                    href="#{{ 'home_about_title' . $lang->code }}" role="tab"
                                    aria-controls="{{ 'home_about_title' . $lang->code }}"
                                    aria-selected="{{ $key === 0 ? 'true' : 'false' }}">{{ '[' . strtoupper($lang->code) . ']' }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body p-0">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            @foreach ($langs as $key => $lang)
                            <div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}"
                                id="{{ 'home_about_title' . $lang->code }}" role="tabpanel"
                                aria-labelledby="custom-tabs-four-home-tab">
                                <div class="card-body">
                                    <div class="form-group d-block">
                                        <label for="home_about_title.{{ $lang->code }}">Ana sehifədəki Haqqımızda
                                            Başlıq</label>
                                        <input type="text"
                                            class="form-control @error('home_about_title.' . $lang->code)is-invalid @enderror"
                                            id="home_about_title.{{ $lang->code }}"
                                            name="home_about_title[{{ $lang->code }}]"
                                            value="{{ old('home_about_title' . '.' . $lang->code, isset($settings->home_about_titles[$lang->code]) ? $settings->home_about_titles[$lang->code] : '') }}">
                                        @error('home_about_title.' . $lang->code)
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-7 col-12">
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-header p-3 py-2">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            @foreach ($langs as $key => $lang)
                            <li class="nav-item" role="presentation">
                                <a class="nav-link {{ $key === 0 ? 'active' : '' }} @error('home_about_subtitle.' . $lang->code)text-danger @enderror"
                                    id="{{ $lang->code . 'home_about_subtitle' }}" data-bs-toggle="tab"
                                    href="#{{ 'home_about_subtitle' . $lang->code }}" role="tab"
                                    aria-controls="{{ 'home_about_subtitle' . $lang->code }}"
                                    aria-selected="{{ $key === 0 ? 'true' : 'false' }}">{{ '[' . strtoupper($lang->code) . ']' }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body p-0">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            @foreach ($langs as $key => $lang)
                            <div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}"
                                id="{{ 'home_about_subtitle' . $lang->code }}" role="tabpanel"
                                aria-labelledby="custom-tabs-four-home-tab">
                                <div class="card-body">
                                    <div class="form-group d-block">
                                        <label for="home_about_subtitle.{{ $lang->code }}">Ana sehifədəki Haqqımızda Alt
                                            Başlıq</label>
                                        <input type="text"
                                            class="form-control @error('home_about_subtitle.' . $lang->code)is-invalid @enderror"
                                            id="home_about_subtitle.{{ $lang->code }}"
                                            name="home_about_subtitle[{{ $lang->code }}]"
                                            value="{{ old('home_about_subtitle' . '.' . $lang->code, isset($settings->home_about_subtitles[$lang->code]) ? $settings->home_about_subtitles[$lang->code] : '') }}">
                                        @error('home_about_subtitle.' . $lang->code)
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-header p-3 py-2">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            @foreach ($langs as $key => $lang)
                            <li class="nav-item" role="presentation">
                                <a class="nav-link {{ $key === 0 ? 'active' : '' }} @error('home_about_desc.' . $lang->code)text-danger @enderror"
                                    id="{{ $lang->code . 'home_about_desc' }}" data-bs-toggle="tab"
                                    href="#{{ 'home_about_desc' . $lang->code }}" role="tab"
                                    aria-controls="{{ 'home_about_desc' . $lang->code }}"
                                    aria-selected="{{ $key === 0 ? 'true' : 'false' }}">{{ '[' . strtoupper($lang->code) . ']' }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body p-0">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            @foreach ($langs as $key => $lang)
                            <div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}"
                                id="{{ 'home_about_desc' . $lang->code }}" role="tabpanel"
                                aria-labelledby="custom-tabs-four-home-tab">
                                <div class="card-body">
                                    <div class="form-group d-block">
                                        <label for="home_about_desc.{{ $lang->code }}">Ana sehifədəki Haqqımızda
                                            Təsvir</label>
                                        <textarea type="text"
                                            class="form-control @error('home_about_desc.' . $lang->code)is-invalid @enderror"
                                            name="home_about_desc[{{ $lang->code }}]"
                                            id="home_about_desc.{{ $lang->code }}">{{ old('home_about_desc' . '.' . $lang->code, isset($settings->home_about_descs[$lang->code]) ? $settings->home_about_descs[$lang->code] : '') }}</textarea>
                                        @error('home_about_desc.' . $lang->code)
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4 col-12">
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-header p-3 py-2">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            @foreach ($langs as $key => $lang)
                            <li class="nav-item" role="presentation">
                                <a class="nav-link {{ $key === 0 ? 'active' : '' }} @error('time_line_title.' . $lang->code)text-danger @enderror"
                                    id="{{ $lang->code . 'time_line_title' }}" data-bs-toggle="tab"
                                    href="#{{ 'time_line_title' . $lang->code }}" role="tab"
                                    aria-controls="{{ 'time_line_title' . $lang->code }}"
                                    aria-selected="{{ $key === 0 ? 'true' : 'false' }}">{{ '[' . strtoupper($lang->code) . ']' }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body p-0">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            @foreach ($langs as $key => $lang)
                            <div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}"
                                id="{{ 'time_line_title' . $lang->code }}" role="tabpanel"
                                aria-labelledby="custom-tabs-four-home-tab">
                                <div class="card-body">
                                    <div class="form-group d-block">
                                        <label for="time_line_title.{{ $lang->code }}">Zaman Xətti Başlıq</label>
                                        <input type="text"
                                            class="form-control @error('time_line_title.' . $lang->code)is-invalid @enderror"
                                            id="time_line_title.{{ $lang->code }}"
                                            name="time_line_title[{{ $lang->code }}]"
                                            value="{{ old('time_line_title' . '.' . $lang->code, isset($settings->time_line_titles[$lang->code]) ? $settings->time_line_titles[$lang->code] : '') }}">
                                        @error('time_line_title.' . $lang->code)
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4 col-12">
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-header p-3 py-2">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            @foreach ($langs as $key => $lang)
                            <li class="nav-item" role="presentation">
                                <a class="nav-link {{ $key === 0 ? 'active' : '' }} @error('footer_title.' . $lang->code)text-danger @enderror"
                                    id="{{ $lang->code . 'footer_title' }}" data-bs-toggle="tab"
                                    href="#{{ 'footer_title' . $lang->code }}" role="tab"
                                    aria-controls="{{ 'footer_title' . $lang->code }}"
                                    aria-selected="{{ $key === 0 ? 'true' : 'false' }}">{{ '[' . strtoupper($lang->code) . ']' }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body p-0">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            @foreach ($langs as $key => $lang)
                            <div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}"
                                id="{{ 'footer_title' . $lang->code }}" role="tabpanel"
                                aria-labelledby="custom-tabs-four-home-tab">
                                <div class="card-body">
                                    <div class="form-group d-block">
                                        <label for="footer_title.{{ $lang->code }}">Alt hissə Başlıq</label>
                                        <input type="text"
                                            class="form-control @error('footer_title.' . $lang->code)is-invalid @enderror"
                                            id="footer_title.{{ $lang->code }}" name="footer_title[{{ $lang->code }}]"
                                            value="{{ old('footer_title' . '.' . $lang->code, isset($settings->footer_titles[$lang->code]) ? $settings->footer_titles[$lang->code] : '') }}">
                                        @error('footer_title.' . $lang->code)
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-header p-3 py-2">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            @foreach ($langs as $key => $lang)
                            <li class="nav-item" role="presentation">
                                <a class="nav-link {{ $key === 0 ? 'active' : '' }} @error('about_title.' . $lang->code)text-danger @enderror"
                                    id="{{ $lang->code . 'about_title' }}" data-bs-toggle="tab"
                                    href="#{{ 'about_title' . $lang->code }}" role="tab"
                                    aria-controls="{{ 'about_title' . $lang->code }}"
                                    aria-selected="{{ $key === 0 ? 'true' : 'false' }}">{{ '[' . strtoupper($lang->code) . ']' }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body p-0">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            @foreach ($langs as $key => $lang)
                            <div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}"
                                id="{{ 'about_title' . $lang->code }}" role="tabpanel"
                                aria-labelledby="custom-tabs-four-home-tab">
                                <div class="card-body">
                                    <div class="form-group d-block">
                                        <label for="about_title.{{ $lang->code }}">Haqqımızda Başlıq</label>
                                        <input type="text"
                                            class="form-control @error('about_title.' . $lang->code)is-invalid @enderror"
                                            id="about_title.{{ $lang->code }}" name="about_title[{{ $lang->code }}]"
                                            value="{{ old('about_title' . '.' . $lang->code, isset($settings->about_titles[$lang->code]) ? $settings->about_titles[$lang->code] : '') }}">
                                        @error('about_title.' . $lang->code)
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-header p-3 py-2">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            @foreach ($langs as $key => $lang)
                            <li class="nav-item" role="presentation">
                                <a class="nav-link {{ $key === 0 ? 'active' : '' }} @error('contact_title.' . $lang->code)text-danger @enderror"
                                    id="{{ $lang->code . 'contact_title' }}" data-bs-toggle="tab"
                                    href="#{{ 'contact_title' . $lang->code }}" role="tab"
                                    aria-controls="{{ 'contact_title' . $lang->code }}"
                                    aria-selected="{{ $key === 0 ? 'true' : 'false' }}">{{ '[' . strtoupper($lang->code) . ']' }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body p-0">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            @foreach ($langs as $key => $lang)
                            <div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}"
                                id="{{ 'contact_title' . $lang->code }}" role="tabpanel"
                                aria-labelledby="custom-tabs-four-home-tab">
                                <div class="card-body">
                                    <div class="form-group d-block">
                                        <label for="contact_title.{{ $lang->code }}">Əlaqə Başlıq</label>
                                        <input type="text"
                                            class="form-control @error('contact_title.' . $lang->code)is-invalid @enderror"
                                            id="contact_title.{{ $lang->code }}" name="contact_title[{{ $lang->code }}]"
                                            value="{{ old('contact_title' . '.' . $lang->code, isset($settings->contact_titles[$lang->code]) ? $settings->contact_titles[$lang->code] : '') }}">
                                        @error('contact_title.' . $lang->code)
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-header p-3 py-2">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            @foreach ($langs as $key => $lang)
                            <li class="nav-item" role="presentation">
                                <a class="nav-link {{ $key === 0 ? 'active' : '' }} @error('welding_title.' . $lang->code)text-danger @enderror"
                                    id="{{ $lang->code . 'welding_title' }}" data-bs-toggle="tab"
                                    href="#{{ 'welding_title' . $lang->code }}" role="tab"
                                    aria-controls="{{ 'welding_title' . $lang->code }}"
                                    aria-selected="{{ $key === 0 ? 'true' : 'false' }}">{{ '[' . strtoupper($lang->code) . ']' }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body p-0">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            @foreach ($langs as $key => $lang)
                            <div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}"
                                id="{{ 'welding_title' . $lang->code }}" role="tabpanel"
                                aria-labelledby="custom-tabs-four-home-tab">
                                <div class="card-body">
                                    <div class="form-group d-block">
                                        <label for="welding_title.{{ $lang->code }}">Welding Başlıq</label>
                                        <input type="text"
                                            class="form-control @error('welding_title.' . $lang->code)is-invalid @enderror"
                                            id="welding_title.{{ $lang->code }}" name="welding_title[{{ $lang->code }}]"
                                            value="{{ old('welding_title' . '.' . $lang->code, isset($settings->welding_titles[$lang->code]) ? $settings->welding_titles[$lang->code] : '') }}">
                                        @error('welding_title.' . $lang->code)
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-header p-3 py-2">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            @foreach ($langs as $key => $lang)
                            <li class="nav-item" role="presentation">
                                <a class="nav-link {{ $key === 0 ? 'active' : '' }} @error('casting_title.' . $lang->code)text-danger @enderror"
                                    id="{{ $lang->code . 'casting_title' }}" data-bs-toggle="tab"
                                    href="#{{ 'casting_title' . $lang->code }}" role="tab"
                                    aria-controls="{{ 'casting_title' . $lang->code }}"
                                    aria-selected="{{ $key === 0 ? 'true' : 'false' }}">{{ '[' . strtoupper($lang->code) . ']' }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body p-0">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            @foreach ($langs as $key => $lang)
                            <div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}"
                                id="{{ 'casting_title' . $lang->code }}" role="tabpanel"
                                aria-labelledby="custom-tabs-four-home-tab">
                                <div class="card-body">
                                    <div class="form-group d-block">
                                        <label for="casting_title.{{ $lang->code }}">Casting Başlıq</label>
                                        <input type="text"
                                            class="form-control @error('casting_title.' . $lang->code)is-invalid @enderror"
                                            id="casting_title.{{ $lang->code }}" name="casting_title[{{ $lang->code }}]"
                                            value="{{ old('casting_title' . '.' . $lang->code, isset($settings->casting_titles[$lang->code]) ? $settings->casting_titles[$lang->code] : '') }}">
                                        @error('casting_title.' . $lang->code)
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-header p-3 py-2">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            @foreach ($langs as $key => $lang)
                            <li class="nav-item" role="presentation">
                                <a class="nav-link {{ $key === 0 ? 'active' : '' }} @error('valve_title.' . $lang->code)text-danger @enderror"
                                    id="{{ $lang->code . 'valve_title' }}" data-bs-toggle="tab"
                                    href="#{{ 'valve_title' . $lang->code }}" role="tab"
                                    aria-controls="{{ 'valve_title' . $lang->code }}"
                                    aria-selected="{{ $key === 0 ? 'true' : 'false' }}">{{ '[' . strtoupper($lang->code) . ']' }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body p-0">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            @foreach ($langs as $key => $lang)
                            <div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}"
                                id="{{ 'valve_title' . $lang->code }}" role="tabpanel"
                                aria-labelledby="custom-tabs-four-home-tab">
                                <div class="card-body">
                                    <div class="form-group d-block">
                                        <label for="valve_title.{{ $lang->code }}">Valve Başlıq</label>
                                        <input type="text"
                                            class="form-control @error('valve_title.' . $lang->code)is-invalid @enderror"
                                            id="valve_title.{{ $lang->code }}" name="valve_title[{{ $lang->code }}]"
                                            value="{{ old('valve_title' . '.' . $lang->code, isset($settings->valve_titles[$lang->code]) ? $settings->valve_titles[$lang->code] : '') }}">
                                        @error('valve_title.' . $lang->code)
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-header p-3 py-2">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            @foreach ($langs as $key => $lang)
                            <li class="nav-item" role="presentation">
                                <a class="nav-link {{ $key === 0 ? 'active' : '' }} @error('about_desc.' . $lang->code)text-danger @enderror"
                                    id="{{ $lang->code . 'about_desc' }}" data-bs-toggle="tab"
                                    href="#{{ 'about_desc' . $lang->code }}" role="tab"
                                    aria-controls="{{ 'about_desc' . $lang->code }}"
                                    aria-selected="{{ $key === 0 ? 'true' : 'false' }}">{{ '[' . strtoupper($lang->code) . ']' }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body p-0">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            @foreach ($langs as $key => $lang)
                            <div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}"
                                id="{{ 'about_desc' . $lang->code }}" role="tabpanel"
                                aria-labelledby="custom-tabs-four-home-tab">
                                <div class="card-body">
                                    <div class="form-group d-block">
                                        <label for="about_desc.{{ $lang->code }}">Haqqımızda Təsvir</label>
                                        <textarea type="text"
                                            class="form-control @error('about_desc.' . $lang->code)is-invalid @enderror"
                                            name="about_desc[{{ $lang->code }}]"
                                            id="about_desc.{{ $lang->code }}">{{ old('about_desc' . '.' . $lang->code, isset($settings->about_descs[$lang->code]) ? $settings->about_descs[$lang->code] : '') }}</textarea>
                                        @error('about_desc.' . $lang->code)
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12">
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-header p-3 py-2">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            @foreach ($langs as $key => $lang)
                            <li class="nav-item" role="presentation">
                                <a class="nav-link {{ $key === 0 ? 'active' : '' }} @error('casting_desc.' . $lang->code)text-danger @enderror"
                                    id="{{ $lang->code . 'casting_desc' }}" data-bs-toggle="tab"
                                    href="#{{ 'casting_desc' . $lang->code }}" role="tab"
                                    aria-controls="{{ 'casting_desc' . $lang->code }}"
                                    aria-selected="{{ $key === 0 ? 'true' : 'false' }}">{{ '[' . strtoupper($lang->code) . ']' }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body p-0">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            @foreach ($langs as $key => $lang)
                            <div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}"
                                id="{{ 'casting_desc' . $lang->code }}" role="tabpanel"
                                aria-labelledby="custom-tabs-four-home-tab">
                                <div class="card-body">
                                    <div class="form-group d-block">
                                        <label for="casting_desc.{{ $lang->code }}">Casting Tesvir</label>
                                        <textarea type="text"
                                            class="form-control @error('casting_desc.' . $lang->code)is-invalid @enderror"
                                            name="casting_desc[{{ $lang->code }}]"
                                            id="casting_desc.{{ $lang->code }}">{{ old('casting_desc' . '.' . $lang->code, isset($settings->casting_descs[$lang->code]) ? $settings->casting_descs[$lang->code] : '') }}</textarea>
                                        @error('casting_desc.' . $lang->code)
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
</div>
@endsection