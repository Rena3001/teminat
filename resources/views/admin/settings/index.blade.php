@extends('admin.layout.master')

@push('page_title')
Ümumi Məlumatlar
@endpush
@push('section_title')
Saytin Statik Ümumi Məlumatları
@endpush

@section('content')

<div class="d-flex justify-content-end my-3">
    <a href="{{route('admin.settings.edit')}}" class="btn btn-warning">Məlumatları yenilə</a>
</div>
<div class="card card-primary  mb-3">
    <div class="card-header">
        <h3 class="card-title">Tərcüməsiz sahələr</h3>
    </div>
    <div class="card-body border-bottom">
        <div class="row" style="gap: 20px;">
            <!-- Simple fields -->
            <div class="col-lg-12">
                <div class="settings_fields">
                    <div class="w-fit">
                        <div class="card border border-success w-fit">
                            <div class="card-body">
                                <h4 class="card-title text-warning">Facebook linki</h4>
                                <p class="card-text">{{$settings->fb}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-fit">
                        <div class="card border border-success w-fit">
                            <div class="card-body">
                                <h4 class="card-title text-warning">Twitter linki</h4>
                                <p class="card-text">{{$settings->tw}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-fit">
                        <div class="card border border-success w-fit">
                            <div class="card-body">
                                <h4 class="card-title text-warning">Linkedin linki</h4>
                                <p class="card-text">{{$settings->in}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-fit">
                        <div class="card border border-success w-fit">
                            <div class="card-body">
                                <h4 class="card-title text-warning">Instagram linki</h4>
                                <p class="card-text">{{$settings->inst}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-fit">
                        <div class="card border border-success w-fit">
                            <div class="card-body">
                                <h4 class="card-title text-warning">Youtube linki</h4>
                                <p class="card-text">{{$settings->yt}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-fit">
                        <div class="card border border-success w-fit">
                            <div class="card-body">
                                <h4 class="card-title text-warning">Ünvan</h4>
                                <p class="card-text">{{$settings->address}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-fit">
                        <div class="card border border-success w-fit">
                            <div class="card-body">
                                <h4 class="card-title text-warning">Telefon nömrə</h4>
                                <p class="card-text">{{$settings->phone}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-fit">
                        <div class="card border border-success w-fit">
                            <div class="card-body">
                                <h4 class="card-title text-warning">Fax nömrə</h4>
                                <p class="card-text">{{$settings->fax}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-fit">
                        <div class="card border border-success w-fit">
                            <div class="card-body">
                                <h4 class="card-title text-warning">E-poçt ünvanı</h4>
                                <p class="card-text">{{$settings->email}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-fit">
                        <div class="card border border-success w-fit">
                            <div class="card-body">
                                <h4 class="card-title text-warning">Haqqımızda səhifəsinin youtube linki</h4>
                                <p class="card-text">{{$settings->about_iframe}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-header">
        <h3 class="card-title">Şəkillər</h3>
    </div>
    <div class="card-body border-bottom">
        <div class="row" style="row-gap: 20px;">
            <!-- Images -->
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <img class="card-img-top border-bottom py-2"
                        src="{{$settings->image_logo_light != '#' ? $settings->image_logo_light : asset('admin/assets/img/elektrod_logo.svg')}}"
                        alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Açıq rəngli tema üçün Logo</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <img class="card-img-top border-bottom py-2"
                        src="{{$settings->image_logo_dark != '#' ? $settings->image_logo_dark : asset('admin/assets/img/elektrod_logo.svg')}}"
                        alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Tünd rəngli tema üçün Logo</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <img class="card-img-top border-bottom py-2"
                        src="{{$settings->about_banner != '#' ? $settings->about_banner : asset('admin/assets/img/elektrod_logo.svg')}}"
                        alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Haqqımızda Səhifəsinin Banner Şəkli</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <img class="card-img-top border-bottom py-2"
                        src="{{$settings->contact_image != '#' ? $settings->contact_image : asset('admin/assets/img/elektrod_logo.svg')}}"
                        alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Əlaqə Səhifəsinin Şəkli</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <img class="card-img-top border-bottom py-2"
                        src="{{$settings->welding_image != '#' ? $settings->welding_image : asset('admin/assets/img/elektrod_logo.svg')}}"
                        alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Welding Ana səhifədəki Şəkli</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <img class="card-img-top border-bottom py-2"
                        src="{{$settings->casting_image != '#' ? $settings->casting_image : asset('admin/assets/img/elektrod_logo.svg')}}"
                        alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Casting Ana səhifədəki Şəkli</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <img class="card-img-top border-bottom py-2"
                        src="{{$settings->valve_image != '#' ? $settings->valve_image : asset('admin/assets/img/elektrod_logo.svg')}}"
                        alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Valve Ana səhifədəki Şəkli</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-header">
        <h3 class="card-title">Tərcümə olunan sahələr</h3>
    </div>
    <div class="card-body">
        <div class="row" style="row-gap: 20px;">
            <div class="col-md-5 col-12">
                <div class="card border border-success">
                    <div class="card-body">
                        <h4 class="card-title text-warning">Ana sehifədəki Haqqımızda Başlıq</h4>
                        @foreach ($settings->home_about_titles as $lang=>$value)
                        <p class="card-text"><strong class="me-3 text-info">{{strtoupper($lang)}}</strong>{{$value}}
                        </p>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-7 col-12">
                <div class="card border border-success">
                    <div class="card-body">
                        <h4 class="card-title text-warning">Ana sehifədəki Haqqımızda Alt Başlıq</h4>
                        @foreach ($settings->home_about_subtitles as $lang=>$value)
                        <p class="card-text border-top pt-2"><strong
                                class="me-3 text-info">{{strtoupper($lang)}}</strong>{{$value}}
                        </p>
                        @endforeach
                    </div>
                </div>
            </div>


            <div class="col-12">
                <div class="card border border-success">
                    <div class="card-body">
                        <h4 class="card-title text-warning">Ana sehifədəki Haqqımızda Təsvir</h4>
                        @foreach ($settings->home_about_descs as $lang=>$value)
                        <p class="card-text border-top pt-2" style="clear: both;"><strong
                                class="me-3 text-info">{{strtoupper($lang)}}</strong>
                        </p>
                        <div>
                            {!!$value!!}
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="card border border-success">
                    <div class="card-body">
                        <h4 class="card-title text-warning">Zaman Xətti Başlıq</h4>
                        @foreach ($settings->time_line_titles as $lang=>$value)
                        <p class="card-text"><strong class="me-3 text-info">{{strtoupper($lang)}}</strong>{{$value}}
                        </p>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="card border border-success">
                    <div class="card-body">
                        <h4 class="card-title text-warning">Alt hissə Başlıq</h4>
                        @foreach ($settings->footer_titles as $lang=>$value)
                        <p class="card-text"><strong class="me-3 text-info">{{strtoupper($lang)}}</strong>{{$value}}
                        </p>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="card border border-success">
                    <div class="card-body">
                        <h4 class="card-title text-warning">Haqqımızda Başlıq</h4>
                        @foreach ($settings->about_titles as $lang=>$value)
                        <p class="card-text"><strong class="me-3 text-info">{{strtoupper($lang)}}</strong>{{$value}}
                        </p>
                        @endforeach
                    </div>
                </div>
            </div>


            <div class="col-md-6 col-12">
                <div class="card border border-success ">
                    <div class="card-body">
                        <h4 class="card-title text-warning">Əlaqə Başlıq</h4>
                        @foreach ($settings->contact_titles as $lang=>$value)
                        <p class="card-text"><strong class="me-3 text-info">{{strtoupper($lang)}}</strong>{{$value}}
                        </p>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="card border border-success ">
                    <div class="card-body">
                        <h4 class="card-title text-warning">Welding Başlıq</h4>
                        @foreach ($settings->welding_titles as $lang=>$value)
                        <p class="card-text"><strong class="me-3 text-info">{{strtoupper($lang)}}</strong>{{$value}}
                        </p>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="card border border-success ">
                    <div class="card-body">
                        <h4 class="card-title text-warning">Casting Başlıq</h4>
                        @foreach ($settings->casting_titles as $lang=>$value)
                        <p class="card-text"><strong class="me-3 text-info">{{strtoupper($lang)}}</strong>{{$value}}
                        </p>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="card border border-success ">
                    <div class="card-body">
                        <h4 class="card-title text-warning">Valve Başlıq</h4>
                        @foreach ($settings->valve_titles as $lang=>$value)
                        <p class="card-text"><strong class="me-3 text-info">{{strtoupper($lang)}}</strong>{{$value}}
                        </p>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card border border-success ">
                    <div class="card-body">
                        <h4 class="card-title text-warning">Haqqımızda Təsvir</h4>
                        @foreach ($settings->about_descs as $lang=>$value)
                        <p class="card-text" style="clear: both;"><strong
                                class="me-3 text-info">{{strtoupper($lang)}}</strong>
                        </p>
                        <div>
                            {!!$value!!}
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card border border-success ">
                    <div class="card-body">
                        <h4 class="card-title text-warning">Casting Tesvir</h4>
                        @foreach ($settings->casting_descs as $lang=>$value)
                        <p class="card-text"><strong class="me-3 text-info">{{strtoupper($lang)}}</strong>{{$value}}
                        </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection