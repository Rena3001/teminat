@extends('client.layout.master')
@section('page_title', "Elektrod")
@section('content')
<main class="main">

    <div class="swiper bannerSwiper" id="homeBanner">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="https://file.gedik.com.tr/web/slider/welding_2.jpg" alt="">
            </div>
            <div class="swiper-slide">
                <img src="https://file.gedik.com.tr/web/slider/valve_2.jpg" alt="">
            </div>
            <div class="swiper-slide">
                <img src="https://file.gedik.com.tr/web/slider/casting_2.jpg" alt="">
            </div>
            <div class="swiper-slide">
                <img src="https://file.gedik.com.tr/web/slider/gev_2.jpg" alt="">
            </div>
        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>

    {{-- <section class="navBox">
        <ul>
            <li class="navBox__card" style="background-image: url(https://gedik.com.tr/img/brands/kaynak.jpg);">
                <a href="#">
                    Welding
                </a>
            </li>
            <li class="navBox__card" style="background-image: url(https://gedik.com.tr/img/brands/dokum.jpg);">
                <a href="#">
                    Valve
                </a>
            </li>
            <li class="navBox__card" style="background-image: url(	https://gedik.com.tr/img/brands/gev.jpg);">
                <a href="#">
                    Casting
                </a>
            </li>
        </ul>
    </section> --}}



     <!--                                         PRODUCTS                                 -->

    <section class="products">
        <div class="container">
            <h3>Products</h3>
            <div class="products__list">

                <!-- 10 dene product card -->

                <a href="#">
                    <div class="product_detail_card">
                      <div class="electrode_card_logo">
                        <img
                          src="https://gedik.com.tr/img/brands/geka.png"
                          alt="electrode logo"
                        />
                      </div>
                      <div class="electrode_card_img">
                        <img
                          src="https://file.gedik.com.tr/portal/approval_documents/GeKa-Elektrot-grey_60df03be2fd46.png"
                          alt="elctrode"
                        />
                      </div>
                      <div class="card_detail">
                        <p>ELECTRODE-ELIT</p>
                        <p>(E-6013)</p>
                        <button>PRODUCT DETAIL</button>
                      </div>
                    </div>
                </a>


            </div>

            <a href="#" class="products__loadMore">
                Load more
            </a>

        </div>
    </section>

    <section class="about-contact container">
        <section class="contact">
            <h3>
                <i class="fa-solid fa-paper-plane"></i>
                CONTACT US
            </h3>
            <form class="contactForm">
                <label>
                    Name, Surname
                    <input name="fullname" type="text">
                </label>

                <label>
                    E-mail
                    <input name="email" type="text">
                </label>

                <label>
                    Phone Number
                    <input name="phone" type="text">
                </label>

                <label>
                    Your Message
                    <div class="textarea">
                        <textarea name="message"></textarea>
                    </div>
                </label>
                <button>Send</button>
            </form>
        </section>

        <section class="about">
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos exercitationem non incidunt assumenda, veniam iure rem quisquam iste id quod aliquam consequuntur ipsam fugit ex sint explicabo dolorum repellendus suscipit.
                Ullam numquam velit minus accusamus veniam incidunt asperiores dolore ratione iusto magnam at ut voluptatem eos maiores, soluta unde, inventore deleniti? Voluptas aperiam, iure reprehenderit ullam provident perferendis voluptates consectetur!
                Magni eveniet saepe voluptatibus dolorem, maiores obcaecati sequi sit temporibus atque nobis mollitia. Voluptates, ipsam inventore! Ipsum incidunt, officiis quidem officia eius sint excepturi veritatis. Perspiciatis at corporis nisi voluptatem!
                Velit libero, nihil deserunt neque sint aliquid iste ipsam illum, rem totam dignissimos quod consequatur atque. Reprehenderit perferendis maiores saepe quaerat? Corporis earum omnis velit maxime voluptas veniam natus a.
                A quis, praesentium aliquid cum, eaque dicta ipsa ullam facilis reprehenderit error expedita veritatis fugit in, natus placeat eligendi nobis quas commodi exercitationem alias quibusdam vitae quo obcaecati. Error, quo!
                Obcaecati voluptate ducimus accusantium expedita, corporis dolore maxime molestiae ex nobis aliquid veniam quidem deserunt aliquam sit autem debitis eaque fugit tenetur rem excepturi in, placeat natus eius. Eligendi, unde.
                Maxime necessitatibus temporibus quos nostrum corporis quod architecto nisi natus iure repellat ea dolor cupiditate pariatur numquam, eaque, fugit minima optio blanditiis! Quasi nesciunt ea ipsum ipsa amet excepturi voluptate.
                Soluta amet porro iste maiores nam eos? Consequuntur obcaecati, voluptatum veniam neque harum iste praesentium voluptas! Quaerat, atque nostrum. Fugiat non temporibus quasi ullam corrupti incidunt natus a consequatur excepturi!
            </p>
            <a href="#" class="about__more">
                Continue Reading
            </a>
        </section>
    </section>



</main>
@endsection
