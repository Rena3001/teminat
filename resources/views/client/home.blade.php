@extends('client.layout.master')
@section('page_title', "Təminat")
@push('js')

@endpush
@section('content')

    <main>
      <section class="presentation">
        <div class="container">
          <div class="presentation_block">
            <div class="presentation_about">
              <h1>Hər Növ Təminat</h1>
              <div class="presentation_text">
                <p class="presentation_web_p">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                  Ut enim ad minim veniam, quis nostrud exercitation ullamco
                  laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                  irure dolor in reprehenderit in voluptate velit esse cillum
                  dolore eu fugiat nulla pariatur.
                </p>
                <p class="presentation_mob_p">
                  Istənilən növ təminat sizə təşkil olunur və çatırılır
                </p>
              </div>
              <div class="presentation_btns">
                <a href="#">Daha Ətraflı</a>
                <a href="#"
                  ><i class="fa-solid fa-chevron-right"></i
                  ><span>Əlaqə</span></a
                >
              </div>
            </div>
            <div class="presentation_collage">
              <div class="presentation_img">
                <img src="./assets/images/presentation3.jpg" alt="" />
                <img src="./assets/images/presentation1.jpg" alt="" />
              </div>
              <div class="presentation_img">
                <img src="./assets/images/presentation1.jpg" alt="" />
                <img src="./assets/images/presentation2.jpg" alt="" />
              </div>
              <div class="presentation_img">
                <img src="./assets/images/presentation3.jpg" alt="" />
                <img src="./assets/images/presentation4.jpg" alt="" />
              </div>
              <div class="presentation_img last">
                <img src="./assets/images/presentation4.jpg" alt="" />
                <img src="./assets/images/presentation5.jpg" alt="" />
              </div>
            </div>
            <div class="presentation_btn">
              <a href="#">Daha Ətraflı</a>
            </div>
          </div>
        </div>
      </section>
      <section class="services">
        <div class="container">
          <div class="services_block">
            <div class="services_item">
              <div class="services_img">
                <img src="./assets/images/services.png" alt="services_img" />
              </div>
              <h2>Xidmətlər</h2>
              <ul>
                <li>Suppliers Search</li>
                <li>Terms of Negotiation</li>
                <li>Loading & Consolidation</li>
                <li>Quality Control</li>
                <li>Production Follow-Up</li>
                <li>Export Documents</li>
              </ul>
              <div class="services_btn">
                <a href="#">Ətraflı</a>
              </div>
            </div>

            <div class="services_item">
              <div class="services_img">
                <img src="./assets/images/services_2.png" alt="services_img" />
              </div>
              <h2>Məsul kateqoriyası</h2>
              <ul>
                <li>Suppliers Search</li>
                <li>Terms of Negotiation</li>
                <li>Loading & Consolidation</li>
                <li>Quality Control</li>
                <li>Production Follow-Up</li>
                <li>Export Documents</li>
              </ul>
              <div class="services_btn">
                <a href="#">Ətraflı</a>
              </div>
            </div>

            <div class="services_item">
              <div class="services_img">
                <img src="./assets/images/services_3.png" alt="services_img" />
              </div>
              <h2>Kataloqlar</h2>
              <ul>
                <li>Suppliers Search</li>
                <li>Terms of Negotiation</li>
                <li>Loading & Consolidation</li>
                <li>Quality Control</li>
                <li>Production Follow-Up</li>
                <li>Export Documents</li>
              </ul>
              <div class="services_btn">
                <a href="#">Ətraflı</a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="about">
        <div class="background">
          <video autoplay loop muted plays-inline class="back_video">
            <source src="./assets/images/about.mp4" type="video/mp4" />
          </video>
        </div>
        <div class="overlay">
          <div class="about_block">
            <div class="container">
              <h2>Təminat Haqqında</h2>
              <div class="about_text">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                  Ut enim ad minim veniam, quis nostrud exercitation ullamco
                  laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                  irure dolor in reprehenderit in voluptate velit esse cillum
                  dolore eu fugiat nulla pariatur.Lorem ipsum dolor sit amet,
                  consectetur adipiscing elit, sed do eiusmod tempor incididunt
                  ut labore et dolore magna aliqua.
                </p>
              </div>
              <div class="about_btn">
                <a href="#">Daha Ətraflı</a>
              </div>
            </div>
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
      <section class="contact">
        <div class="container">
          <div class="contact_block">
            <div class="contact_info">
              <div class="contact_info_img">
                <img src="./assets/images/contact.jpg" alt="contact" />
              </div>
              <div class="contact_overlay">
                <h2>Bizimlə əlaqə saxla</h2>
                <div class="contact_notification">
                  <p>
                    Formu doldurduqdan sonra siznən 24 saat ərzində əlaqə
                    saxlanacaq
                  </p>
                </div>
                <ul class="contacts">
                  <li>
                    <div class="contacts_email_img">
                      <img src="./assets/images/email.svg" alt="email" />
                    </div>
                    <span>təminat@gmail.com</span>
                  </li>
                  <li>
                    <div class="contacts_phone_img">
                      <img src="./assets/images/phone.svg" alt="phone" />
                    </div>
                    <span>051 559 28 21</span>
                  </li>
                  <li>
                    <div class="contacts_location_img">
                      <img src="./assets/images/location.svg" alt="location" />
                    </div>
                    <span
                      >Lorem ipsum dolor sit amet, consectetur adipiscing
                      elit</span
                    >
                  </li>
                </ul>
                <ul class="social_media">
                  <li>
                    <a href="#">
                      <div class="facebook_img">
                        <img
                          src="./assets/images/facebook.svg"
                          alt="facebook"
                        />
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="instagram_img">
                        <img
                          src="./assets/images/instagram.svg"
                          alt="instagram"
                        />
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="whatsapp_img">
                        <img
                          src="./assets/images/whatsapp.svg"
                          alt="whatsapp"
                        />
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="contact_form">
              <h2>Sorğunuzu göndərin</h2>
              <div class="contact_notification">
                <p>Fikirləriniz və rəyləriniz bizə vacibdir.</p>
              </div>
              <form>
                <div class="form_main">
                  <div class="form_block">
                    <div class="input_block">
                      <span class="name_title">Ad, Soyad</span>
                      <div class="input_item">
                        <label for="fname">
                          <div class="user_img">
                            <img src="./assets/images/user.svg" alt="user" />
                          </div>
                        </label>
                        <input type="text" id="fname" required />
                      </div>
                    </div>
                    <div class="input_block">
                      <span class="email_title">Email</span>
                      <div class="input_item">
                        <label for="email">
                          <div class="letter_img">
                            <img
                              src="./assets/images/letter.svg"
                              alt="letter"
                            />
                          </div>
                        </label>
                        <input type="email" id="email" />
                      </div>
                    </div>
                    <div class="input_block">
                      <span class="profession_title">Vəzifə</span>
                      <div class="input_item">
                        <label for="profession">
                          <div class="stairs_img">
                            <img
                              src="./assets/images/stairs.svg"
                              alt="stairs"
                            />
                          </div>
                        </label>
                        <input type="text" id="profession" />
                      </div>
                    </div>
                    <div class="input_block">
                      <span class="phone_title">Mobil</span>
                      <div class="input_item">
                        <label for="number">
                          <div class="device_img">
                            <img
                              src="./assets/images/device.svg"
                              alt="device"
                            />
                          </div>
                        </label>
                        <input type="tel" id="number" />
                      </div>
                    </div>
                    <div class="input_block">
                      <span class="file_title">Faylı endir</span>
                      <div class="input_item">
                        <label for="file" class="custom_file_upload">
                          <div class="file_img">
                            <img src="./assets/images/file.svg" alt="file" />
                          </div>
                          <p>Faylı endir</p>
                        </label>
                        <input type="file" id="file" hidden />
                      </div>
                    </div>
                  </div>
                  <div class="form_note">
                    <label for="note">Qeyd</label>
                    <textarea
                      name="note"
                      id="note"
                      placeholder="Qeydinizi göndərin"
                    ></textarea>
                  </div>
                </div>
                <button>Göndər</button>
              </form>
            </div>
          </div>
        </div>
      </section>
    </main>

    <div class="scroll_top_block">
      <a id="scroll_top" href="#">
        <img src="./assets/images/scroll_top_btn.png" />
        <img src="./assets/images/scroll_top_btn.png" />
      </a>
    </div>


@endsection
