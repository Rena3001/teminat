@extends('client.layout.master')
@section('page_title', "About")

@section('content')


    <main>
      <section class="about">
        <div class="container">
          <div class="about-content">
            <h2 class="about_heading">Təminat Haqqında</h2>
            <div class="about_text">
              <p>
                tcillum dolore eu fugiat nulla pariatur.Lorem ipsum dolor sit
                amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.tcillum dolore eu
                fugiat nulla pariatur.Lorem ipsum dolor sit amet, consectetur
                adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua.tcillum dolore eu fugiat nulla
                pariatur.Lorem ipsum dolor sit amet, consectetur adipiscing
                elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                aliqua.
              </p>
            </div>
          </div>
          <div class="about_video">
            <video
              autoplay
              loop
              muted
              plays-inline
              src="./assets/images/about-page-video.mp4"
            ></video>
          </div>
        </div>
      </section>

      <section class="testimonials">
        <div class="container">
          <div class="testimonials_heading">
            <h2>Bizim müştərilərimiz nə deyir?</h2>
            <div class="slider_nav">
              <button class="prev_testimonial">
                <i class="fa-solid fa-angle-left"></i>
              </button>
              <button class="next_testimonial">
                <i class="fa-solid fa-angle-right"></i>
              </button>
            </div>
          </div>
          <div class="testimonials_content">
            <div class="swiper testimonials_swiper">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="testimonial_card">
                    <div class="card_heading">
                      <img src="./assets/images/testimonials-icon.png" alt="" />
                      <p>Şirkət Qrup</p>
                    </div>
                    <div class="card_content">
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea
                        commodo consequat. Duis aute irure dolor in
                        reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur.Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua.
                      </p>
                    </div>
                    <div class="card_footer">
                      <img src="./assets/images/testimonial.png" alt="" />
                      <div class="card_info">
                        <p>Nadir Həsənov</p>
                        <p>Gen-derektor Şirkət qrup</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="testimonial_card">
                    <div class="card_heading">
                      <img src="./assets/images/testimonials-icon.png" alt="" />
                      <p>Şirkət Qrup</p>
                    </div>
                    <div class="card_content">
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea
                        commodo consequat. Duis aute irure dolor in
                        reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur.Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua.
                      </p>
                    </div>
                    <div class="card_footer">
                      <img src="./assets/images/testimonial.png" alt="" />
                      <div class="card_info">
                        <p>Nadir Həsənov</p>
                        <p>Gen-derektor Şirkət qrup</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="testimonial_card">
                    <div class="card_heading">
                      <img src="./assets/images/testimonials-icon.png" alt="" />
                      <p>Şirkət Qrup</p>
                    </div>
                    <div class="card_content">
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea
                        commodo consequat. Duis aute irure dolor in
                        reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur.Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua.
                      </p>
                    </div>
                    <div class="card_footer">
                      <img src="./assets/images/testimonial.png" alt="" />
                      <div class="card_info">
                        <p>Nadir Həsənov</p>
                        <p>Gen-derektor Şirkət qrup</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="testimonials-footer">
            <div class="slider_nav">
              <button class="prev_testimonial">
                <i class="fa-solid fa-angle-left"></i>
              </button>
              <button class="next_testimonial">
                <i class="fa-solid fa-angle-right"></i>
              </button>
            </div>
          </div>
        </div>
      </section>
    </main>


@endsection
