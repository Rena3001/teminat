@extends('client.layout.master')

@section('page_title', 'Contact')

@push('styles')
    <link rel="stylesheet" href="{{ asset('client/assets/style/contact.css') }}" />
@endpush

@section('content')

    <main>
        <section class="contact">
            <div class="container">
                <div class="contact_block">
                    <div class="contact_info">
                        <div class="contact_info_img">
                            <img src="{{ asset('client/assets/images/contact.jpg') }}" alt="contact" />
                        </div>
                        <div class="contact_overlay">
                            <h2>{{ __('word.contact_us') }}</h2>
                            <div class="contact_notification">
                                <p>
                                    {{ __('word.contact_notification') }}
                                </p>
                            </div>
                            <ul class="contacts">
                                <li>
                                    <div class="contacts_email_img">
                                        <img src="{{ asset('client/assets/images/email.svg') }}" alt="email" />
                                    </div>
                                    <span>{{ $settings->email }}</span>
                                </li>
                                <li>
                                    <div class="contacts_phone_img">
                                        <img src="{{ asset('client/assets/images/phone.svg') }}" alt="phone" />
                                    </div>
                                    <span>{{ $settings->phone }}</span>
                                </li>
                                <li>
                                    <div class="contacts_location_img">
                                        <img src="{{ asset('client/assets/images/location.svg') }}" alt="location" />
                                    </div>
                                    <span>{{ $settings->address }}</span>
                                </li>
                            </ul>
                            <ul class="social_media">
                                <li>
                                    <a href="#">
                                        <div class="facebook_img">
                                            <img src="{{ asset('client/assets/images/facebook.svg') }}" alt="facebook" />
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="instagram_img">
                                            <img src="{{ asset('client/assets/images/instagram.svg') }}" alt="instagram" />
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="whatsapp_img">
                                            <img src="{{ asset('client/assets/images/whatsapp.svg') }}" alt="whatsapp" />
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="contact_form">
                        <h2>{{ __('word.request') }}</h2>
                        <div class="contact_notification">
                            <p>{{ __('word.feedback') }}</p>
                        </div>
                        
                        <form action="{{ route('client.contact.submit') }}" method="POST">
                            @csrf
                            <div class="form_main">
                                <div class="form_block">
                                    <div class="input_block">
                                        <span class="name_title">{{ __('word.name') }},{{ __('word.surname') }}</span>
                                        <div class="input_item">
                                            <label for="fname">
                                                <div class="user_img">
                                                    <img src="{{ asset('client/assets/images/user.svg') }}"
                                                        alt="user" />
                                                </div>
                                            </label>
                                            <input type="text" id="fname" name="fname" required />
                                        </div>
                                    </div>
                                    <div class="input_block">
                                        <span class="email_title">{{ __('word.email') }}</span>
                                        <div class="input_item">
                                            <label for="email">
                                                <div class="letter_img">
                                                    <img src="{{ asset('client/assets/images/letter.svg') }}"
                                                        alt="letter" />
                                                </div>
                                            </label>
                                            <input type="email" id="email" name="email" />
                                        </div>
                                    </div>
                                    <div class="input_block">
                                        <span class="profession_title">{{ __('word.position') }}</span>
                                        <div class="input_item">
                                            <label for="profession">
                                                <div class="stairs_img">
                                                    <img src="{{ asset('client/assets/images/stairs.svg') }}"
                                                        alt="stairs" />
                                                </div>
                                            </label>
                                            <input type="text" id="profession" name="proffession" />
                                        </div>
                                    </div>
                                    <div class="input_block">
                                        <span class="phone_title">{{ __('word.phone_number') }}</span>
                                        <div class="input_item">
                                            <label for="number">
                                                <div class="device_img">
                                                    <img src="{{ asset('client/assets/images/device.svg') }}"
                                                        alt="device" />
                                                </div>
                                            </label>
                                            <input type="tel" id="number" name="number" />
                                        </div>
                                    </div>
                                    <div class="input_block">
                                        <span class="file_title">{{ __('word.download_file') }}</span>
                                        <div class="input_item">
                                            <label for="file" class="custom_file_upload">
                                                <div class="file_img">
                                                    <img src="{{ asset('client/assets/images/file.svg') }}"
                                                        alt="file" />
                                                </div>
                                                <p>{{ __('word.download_file') }}</p>
                                            </label>
                                            <input type="file" id="file" hidden name="file" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form_note">
                                    <label for="note">{{ __('word.note') }}</label>
                                    <textarea name="note" id="note" placeholder="Qeydinizi göndərin"></textarea>
                                </div>
                            </div>
                            <button>{{ __('word.send') }}</button>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </main>


@endsection
