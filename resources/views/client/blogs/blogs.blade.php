@extends('client.layout.master')
@section('page_title', "Blogs")
@push('styles')
<link rel="stylesheet" href="{{asset('client/assets/style/blog.css')}}" />
@endpush
@section('content')


    <main>
      <section class="blog">
        <div class="container">
          <div class="blog_block">
            <div class="blog_item">
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
                    Ehtiyac olanın tapılması və düzgün şəkildə hazırlanması
                  </h3>
                  <div class="blog_text">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore magna
                      aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                      ullamco
                    </p>
                  </div>
                </div>
              </a>
            </div>

            <div class="blog_item">
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
                    Ehtiyac olanın tapılması və düzgün şəkildə hazırlanması
                  </h3>
                  <div class="blog_text">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore magna
                      aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                      ullamco
                    </p>
                  </div>
                </div>
              </a>
            </div>

            <div class="blog_item">
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
                    Ehtiyac olanın tapılması və düzgün şəkildə hazırlanması
                  </h3>
                  <div class="blog_text">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore magna
                      aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                      ullamco
                    </p>
                  </div>
                </div>
              </a>
            </div>

            <div class="blog_item">
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
                    Ehtiyac olanın tapılması və düzgün şəkildə hazırlanması
                  </h3>
                  <div class="blog_text">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore magna
                      aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                      ullamco
                    </p>
                  </div>
                </div>
              </a>
            </div>

            <div class="blog_item">
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
                    Ehtiyac olanın tapılması və düzgün şəkildə hazırlanması
                  </h3>
                  <div class="blog_text">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore magna
                      aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                      ullamco
                    </p>
                  </div>
                </div>
              </a>
            </div>

            <div class="blog_item">
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
                    Ehtiyac olanın tapılması və düzgün şəkildə hazırlanması
                  </h3>
                  <div class="blog_text">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore magna
                      aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                      ullamco
                    </p>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="page_slider">
            <ul>
              <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">6</a></li>
              <li><a href="#">7</a></li>
              <li><a href="#">8</a></li>
              <li><a href="#">9</a></li>
              <li><a href="#">10</a></li>
            </ul>
          </div>
        </div>
      </section>
    </main>


@endsection
