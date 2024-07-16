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
            <img src="./assets/images/logo/logo dark.png" alt="">
            {{__('menu.contact')}}
        </h1>

        <div class="mainBox__banner">
            <img src="https://gedik.com.tr/img/kariyer-banner.jpg" alt="">
        </div>

        <section class="mainBox__content">
            <h2 class="mainBox__content--heading">{{__('word.contact_us')}}</h2>
            <form action="" class="contactForm">
                <div class="contactForm__inputs">
                    <label>
                        {{__('word.name')}}
                        <input type="text" name="name">
                    </label>

                    <label>
                        {{__('word.surname')}}

                        <input type="text" name="surname">
                    </label>

                    <label>
                        {{__('word.phone')}}

                        <input type="text" name="phone">
                    </label>

                    <label>
                        {{__('word.email')}}

                        <input type="text" name="email">
                    </label>
                </div>

                <label>
                    {{__('word.your_message')}}

                    <div class="textarea">
                        <textarea name="message"></textarea>
                    </div>
                </label>

                <button>
                    {{__('word.send')}}

                </button>
            </form>


        </section>

        <section class="company">
            <div class="company__map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d737.8638179382419!2d49.83870372851556!3d40.397872498207725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40307d7b10b31bbf%3A0xb8a84dda46c78a5!2sADAS%2F%20Azerbaijan%20Digital%20Arts%20School!5e1!3m2!1str!2saz!4v1720423635494!5m2!1str!2saz" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <div class="company__contact">
                <!-- <div class="company__contact--content"> -->
                    <div> <strong>{{__('word.address')}} : </strong>  {{$settings->address}} </div>
                    <div> <strong>{{__('word.num')}} : </strong>  {{$settings->phone}} </div>
                    <div> <strong>{{__('word.email')}}  </strong> {{$settings->email}} </div>
                <!-- </div> -->
            </div>
        </section>

    </main>



@endsection
