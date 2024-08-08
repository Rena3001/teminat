@extends('client.layout.master')
@section('page_title', "Blogs")
@push('styles')
<link rel="stylesheet" href="{{ asset('client/assets/style/blog_page.css') }}" />
@endpush
@section('content')


<main>
    <section class="blog_page">
      <div class="container">
        <div class="blog_page_head">
          <div class="blog_page_head_img">
            <img src="./assets/images/blog.jpg" alt="blog_page_head" />
          </div>
          <div class="overlay_background">
            <h2>Ehtiyac olanın tapılması və düzgün şəkildə hazırlanması</h2>
          </div>
        </div>
        <div class="blog_page_main">
          <div class="blog_page_block">
            <div class="blog_page_about">
              <h2>Lorem inpu lalalala</h2>
              <div class="blog_page_text">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do eiusmod tempor incididunt ut labore et dolore magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  ullamco laboris nisi ut aliquip ex ea commodo consequat.
                  Duis aute irure dolor in reprehenderit in voluptate velit
                  esse cillum dolore eu fugiat nulla pariatur.Lorem ipsum
                  dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua.r
                  adipiscing elit, sed do eiusmod tempor incididunt ut labore
                  et dolore magna aliqua.
                </p>
              </div>
            </div>
            <div class="blog_page_img">
              <img src="./assets/images/blog_page1.jpg" alt="blog_page_img" />
            </div>
          </div>
          <div class="blog_page_block">
            <div class="blog_page_img">
              <img src="./assets/images/blog_page2.jpg" alt="blog_page_img" />
            </div>
            <div class="blog_page_about">
              <h2>Lorem inpu lalalala</h2>
              <div class="blog_page_text">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do eiusmod tempor incididunt ut labore et dolore magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  ullamco laboris nisi ut aliquip ex ea commodo consequat.
                  Duis aute irure dolor in reprehenderit in voluptate velit
                  esse cillum dolore eu fugiat nulla pariatur.Lorem ipsum
                  dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua.r
                  adipiscing elit, sed do eiusmod tempor incididunt ut labore
                  et dolore magna aliqua.
                </p>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do eiusmod tempor incididunt ut labore et dolore magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  ullamco laboris nisi ut aliquip ex ea commodo consequat.
                  Duis aute irure dolor in reprehenderit in voluptate velit
                  esse cillum dolore eu fugiat nulla pariatur.Lorem ipsum
                  dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua.
                </p>
              </div>
            </div>
          </div>
          <div class="blog_page_share">
            <span>Paylaş</span>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
          </div>
        </div>
        <div class="blog_page_others">
          <h2>Lorem inpu lalalala</h2>
          <div class="blog_page_slider">
            <div class="swiper mySwiper">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <a href="#">
                    <div class="blog_img">
                      <img src="./assets/images/blog.jpg" alt="blog" />
                    </div>
                    <div class="overlay">
                      <div href="#">
                        <img src="./assets/images/blog_icon.png" />
                      </div>
                    </div>
                    <div class="blog_about">
                      <h6>Müştərilərin ehtiyacları</h6>
                      <h3>
                        Ehtiyac olanın tapılması və düzgün şəkildə
                        hazırlanması
                      </h3>
                      <div class="blog_text">
                        <p>
                          Lorem ipsum dolor sit amet, consectetur adipiscing
                          elit, sed do eiusmod tempor incididunt ut labore et
                          dolore magna aliqua. Ut enim ad minim veniam, quis
                          nostrud exercitation ullamco
                        </p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="swiper-slide">
                  <a href="#">
                    <div class="blog_img">
                      <img src="./assets/images/blog.jpg" alt="blog" />
                    </div>
                    <div class="overlay">
                      <div href="#">
                        <img src="./assets/images/blog_icon.png" />
                      </div>
                    </div>
                    <div class="blog_about">
                      <h6>Müştərilərin ehtiyacları</h6>
                      <h3>
                        Ehtiyac olanın tapılması və düzgün şəkildə
                        hazırlanması
                      </h3>
                      <div class="blog_text">
                        <p>
                          Lorem ipsum dolor sit amet, consectetur adipiscing
                          elit, sed do eiusmod tempor incididunt ut labore et
                          dolore magna aliqua. Ut enim ad minim veniam, quis
                          nostrud exercitation ullamco
                        </p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="swiper-slide">
                  <a href="#">
                    <div class="blog_img">
                      <img src="./assets/images/blog.jpg" alt="blog" />
                    </div>
                    <div class="overlay">
                      <div href="#">
                        <img src="./assets/images/blog_icon.png" />
                      </div>
                    </div>
                    <div class="blog_about">
                      <h6>Müştərilərin ehtiyacları</h6>
                      <h3>
                        Ehtiyac olanın tapılması və düzgün şəkildə
                        hazırlanması
                      </h3>
                      <div class="blog_text">
                        <p>
                          Lorem ipsum dolor sit amet, consectetur adipiscing
                          elit, sed do eiusmod tempor incididunt ut labore et
                          dolore magna aliqua. Ut enim ad minim veniam, quis
                          nostrud exercitation ullamco
                        </p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="swiper-slide">
                  <a href="#">
                    <div class="blog_img">
                      <img src="./assets/images/blog.jpg" alt="blog" />
                    </div>
                    <div class="overlay">
                      <div href="#">
                        <img src="./assets/images/blog_icon.png" />
                      </div>
                    </div>
                    <div class="blog_about">
                      <h6>Müştərilərin ehtiyacları</h6>
                      <h3>
                        Ehtiyac olanın tapılması və düzgün şəkildə
                        hazırlanması
                      </h3>
                      <div class="blog_text">
                        <p>
                          Lorem ipsum dolor sit amet, consectetur adipiscing
                          elit, sed do eiusmod tempor incididunt ut labore et
                          dolore magna aliqua. Ut enim ad minim veniam, quis
                          nostrud exercitation ullamco
                        </p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="swiper-slide">
                  <a href="#">
                    <div class="blog_img">
                      <img src="./assets/images/blog.jpg" alt="blog" />
                    </div>
                    <div class="overlay">
                      <div href="#">
                        <img src="./assets/images/blog_icon.png" />
                      </div>
                    </div>
                    <div class="blog_about">
                      <h6>Müştərilərin ehtiyacları</h6>
                      <h3>
                        Ehtiyac olanın tapılması və düzgün şəkildə
                        hazırlanması
                      </h3>
                      <div class="blog_text">
                        <p>
                          Lorem ipsum dolor sit amet, consectetur adipiscing
                          elit, sed do eiusmod tempor incididunt ut labore et
                          dolore magna aliqua. Ut enim ad minim veniam, quis
                          nostrud exercitation ullamco
                        </p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="swiper-slide">
                  <a href="#">
                    <div class="blog_img">
                      <img src="./assets/images/blog.jpg" alt="blog" />
                    </div>
                    <div class="overlay">
                      <div href="#">
                        <img src="./assets/images/blog_icon.png" />
                      </div>
                    </div>
                    <div class="blog_about">
                      <h6>Müştərilərin ehtiyacları</h6>
                      <h3>
                        Ehtiyac olanın tapılması və düzgün şəkildə
                        hazırlanması
                      </h3>
                      <div class="blog_text">
                        <p>
                          Lorem ipsum dolor sit amet, consectetur adipiscing
                          elit, sed do eiusmod tempor incididunt ut labore et
                          dolore magna aliqua. Ut enim ad minim veniam, quis
                          nostrud exercitation ullamco
                        </p>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
            <div class="blog_page_slider_btns">
              <a href="#" class="prev_btn">
                <img src="./assets/images/prev_btn.png" />
              </a>
              <a href="#" class="next_btn">
                <img src="./assets/images/next_btn.png" />
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
</main>



@endsection
