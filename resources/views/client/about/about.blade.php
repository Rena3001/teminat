@extends('client.layout.master')
@section('page_title', "About")
@push('styles')
<link rel="stylesheet" href="{{ asset('client/assets/style/about.css') }}" />
@endpush
@section('content')
  <nav class="breadCrump container">
    <ul>
        <li>
            <a href="{{route('client.home')}}">{{__('menu.home')}}</a>
        </li>
        <li>
            <a href="{{route('client.about')}}">{{__('menu.about')}}</a>
        </li>
    </ul>
  </nav>

    <main>
      <div class="container">
        <div class="container_sub">
          <section class="about_us_section mainBox">
            <h1 class="mainbox__heading">
              <img src="{{$settings->logo_dark}}" alt="">
              {{$settings->about_title}}
            </h1>
            <section class="who_we_are">
              <div class="about_text">
                {{ $settings->about_desc }}
              </div>
            </section>
          </section>
        </div>
      </div>
    </main>
    @endsection
