@extends('client.layout.master')
@section('page_title', "About")
@push('styles')
<link rel="stylesheet" href="{{ asset('client/assets/style/about.css') }}" />
@endpush
@section('content')
  <nav class="breadCrump container">
    <ul>
        <li>
            <a href="{{route('client.home')}}">{{__('site.home')}}</a>
        </li>
        <li>
            <a href="{{route('client.about')}}">{{__('site.about')}}</a>
        </li>
    </ul>
  </nav>

    <main>
      <div class="container">
        <div class="container_sub">
          <section class="about_us_section mainBox">
            <!-- <div class="panel_heading">
              <div>ICON</div>
              <h1>Who We Are</h1>
            </div> -->

            <h1 class="mainbox__heading">
              <img src="{{ $settings->image_logo_dark }}" alt="">
              {{__('site.who_we_are')}}
            </h1>
            <!-- sections/1 -->
            <section class="who_we_are">
              <div class="about_text">
                <p>{{ $settings->about_desc }} </p>
                <div class="video">
                  <iframe
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen=""
                    frameborder="0"
                    height="400"
                    src="https://www.youtube.com/embed/S45lRvc3uFs?si=pM8V2UixW5O_1x4R"
                    width="100%"
                  ></iframe>
                </div>
              </div>
            </section>
            <!-- sections/2 -->
            <section class="mission_vision">
              <div class="mission_vision margin_inline mission_vision_flex">
                <div>
                  <h4>{{__('site.our_mission')}}</h4>
                  <p>
                    “We continue with our dedicated work in a world of
                    connectedness and controlled flow combined with education
                    fora flawless operation with zerotolerance for any risk on
                    human life as we also reflect our historic know-how”
                  </p>
                  <h4>{{__('site.our_vision')}}</h4>
                  <p>
                    “With our unifying power, we create global harmony for a
                    secure and inspiring future” &nbsp;
                  </p>
                </div>
              </div>
            </section>
            <!-- sections/3 -->
            <section class="our_founder">
              <div class="margin_inline">
                <div>
                  <p>
                    Halil Kaya Gedik is one of the first international welding
                    engineers o f Turkey, graduated from the Machinery
                    Technician Department of Istanbul Yıldız Technical School in
                    1953. He continued his education in Germany Sta atliche
                    Universitat Konstantz and after getting his mechanical
                    engineering dipl oma completed the International Welding
                    Engineering Program at DVS German Wel ding Society and
                    specialized in this fi During his studies in Germany, worked
                    in various parts of the MAN factor Halil Kaya Gedik, started
                    his career in T urkey in the Welding Group of Eskisehir
                    State Railways Factories in 1957 and
                  </p>
                </div>
                <div>
                  <iframe
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen=""
                    frameborder="0"
                    height="400"
                    width="100%"
                    src="https://www.youtube.com/embed/FhtUzY8zhs4"
                  ></iframe>
                </div>
              </div>
            </section>
            <!-- section/4 -->
            <section class="message_from_our_leader">
              <div class="margin_inline">
                <p>
                  2023 is our 60th Anniversary! 2023 is also the 100th
                  Anniversary of the Turkish Republic! For the first time in the
                  history of the world, we are facin Our foundation is our
                  inspiration, Our 60-Year Anniversary is our pride! Have a
                  Great Year full of success! Hülya GEDİK
                </p>
              </div>
            </section>
            <!-- section/5 -->
            <section class="holding_board_of_directors directors_grid">
              <div class="body_card margin_inline">
                <div class="body_card_img">
                  <img
                    src="https://gedik.com.tr/img/yonetim/HG.jpg?v=202307111730"
                    alt=""
                  />
                </div>
                <div class="body_card_img_description">
                  <h5>Hulya Gedik</h5>
                  <p>Lorem ipsum dolor sit.</p>
                </div>
              </div>

            </section>
            <!-- section/6 -->
            <section class="valve_board directors_grid">

              <div class="body_card margin_inline">
                <div class="body_card_img">
                  <img
                    src="https://gedik.com.tr/img/yonetim/HG.jpg?v=202307111730"
                    alt=""
                  />
                </div>
                <div class="body_card_img_description">
                  <h5>Hulya Gedik</h5>
                  <p>Lorem ipsum dolor sit.</p>
                </div>
              </div>
            </section>
            <!-- section/7 -->
            <section class="casting_board directors_grid">

              <div class="body_card margin_inline">
                <div class="body_card_img">
                  <img
                    src="https://gedik.com.tr/img/yonetim/HG.jpg?v=202307111730"
                    alt=""
                  />
                </div>
                <div class="body_card_img_description">
                  <h5>Hulya Gedik</h5>
                  <p>Lorem ipsum dolor sit.</p>
                </div>
              </div>
            </section>
            <!-- section/8 -->
            <section class="code_of_ethics margin_inline">
              <div class="panel-body">
                <div
                  class="viewPdf pdfobject-container"
                  data-pdf="https://file.gedik.com.tr/web/documents/business-ethics.pdf"
                >
                  <embed
                    class="pdfobject"
                    type="application/pdf"
                    title="Embedded PDF"
                    src="https://file.gedik.com.tr/web/documents/business-ethics.pdf"
                    style="overflow: auto; width: 100%; height: 415px"
                  />
                </div>
              </div>
            </section>
            <!-- section/9 -->
            <section class="corporate margin_inline">
              <div>
                <p>
                  We work to create a more sustainable company and to make a
                  positive impact in our communities, on ociety, and for the
                  planet.
                </p>
              </div>
            </section>
            <!-- section/10 -->
            <section class="social_responsibility margin_inline">
              <div>
                <p>
                  Since the beginning of our history, our founder’s vision of
                  continuing education and care for people helped us to keep
                  walking in his footsteps by getting involved in our
                  communities and education so nobody is left behind.
                </p>
              </div>
            </section>
          </section>
          <!-- aside -->
          <aside class="mainBox">
            <nav>
              <ul>
                <li>
                  <a class="list-group-item active">{{__('site.who_we_are')}}</a>
                </li>
                <li>
                  <a class="list-group-item">{{__('site.mission_vision')}}</a>
                </li>
                <li>
                  <a class="list-group-item">{{__('site.our_founder')}}</a>
                </li>
                <li>
                  <a class="list-group-item">{{__('site.leader')}}</a>
                </li>
                <li>
                  <a class="list-group-item">{{__('site.board_of_directors')}}</a>
                </li>
                <li>
                  <a class="list-group-item">{{__('site.welding_board')}}</a>
                </li>
                <li>
                  <a class="list-group-item">{{__('site.valve_board')}}</a>
                </li>
                <li>
                  <a class="list-group-item">{{__('site.casting_board')}}</a>
                </li>
                <li>
                  <a class="list-group-item">{{__('site.our_code')}}</a>
                </li>
                <li>
                  <a class="list-group-item">{{__('site.responsibility')}}</a>
                </li>
                <li>
                  <a class="list-group-item">{{__('site.soc_resp')}}</a>
                </li>
              </ul>
            </nav>
          </aside>
        </div>
      </div>
    </main>



    @endsection
