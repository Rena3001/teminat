@extends('client.layout.master')

@section('page_title', "About")
@push('styles')
<link rel="stylesheet" href="{{ asset('client/assets/style/contact.css') }}" />

@endpush


@section('content')

    <nav class="breadCrump container">
        <ul>
            <li>
                <a href="{{route('client.home')}}">{{ __('menu.home') }}</a>
            </li>
            <li>
                <a href="{{route('client.contact')}}">{{ __('menu.contact') }}</a>
            </li>
        </ul>
    </nav>

    <main class="mainBox container">

        <h1 class="mainbox__heading">
            <img src="{{$settings->logo_dark}}" alt="">
            {{__('menu.contact')}}
        </h1>

        <div class="mainBox__banner">
            <img src="https://gedik.com.tr/img/kariyer-banner.jpg" alt="">
        </div>

        <section class="mainBox__content">
            <h2 class="mainBox__content--heading">{{__('word.contact_us')}}</h2>
            <form action="{{ route('client.contact.submit') }}" method="POST" class="contactForm">
                @csrf
                <div class="contactForm__inputs">
                    <label>
                        {{__('word.name')}}
                        <input type="text" name="fullname" required>
                    </label>

                    <label>
                        {{__('word.surname')}}
                        <input type="text" name="surname" required>
                    </label>

                    <label>
                        {{__('word.phone')}}
                        <input type="text" name="phone" required>
                    </label>

                    <label>
                        {{__('word.email')}}
                        <input type="email" name="email" required>
                    </label>
                </div>

                <label>
                    {{__('word.your_message')}}
                    <div class="textarea">
                        <textarea name="text" required></textarea>
                    </div>
                </label>

                <button type="submit">
                    {{__('word.send')}}
                </button>
            </form>



        </section>

        <section class="company">
            <div class="company__map">
                    {!! $settings->iframe_map !!}
            </div>

            <div class="company__contact">
                <!-- <div class="company__contact--content"> -->
                    <div> <strong>{{__('word.address')}} : </strong>  {{$settings->address}} </div>
                    <div> <strong>{{__('word.num')}} : </strong>  {{$settings->phone}} </div>
                    <div> <strong>{{__('word.email')}}:  </strong> {{$settings->email}} </div>
                <!-- </div> -->
            </div>
        </section>

    </main>



@endsection
