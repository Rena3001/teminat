<footer class="footer">
    <section class="footer__subs container">
        <p class="footer__subs--header">Be aware of the innovations in Gedik World.</p>
        <form class="footer__subs--form">
            <select name="subscribeSelect" id="subscribeSelect">
                <option value="azerbaijan">Azerbaijan</option>
                <option value="turkey">Turkey</option>
            </select>
            <div class="footer__subs--country">
                <span class="footer__country--active" id="">{{__('site.footer_azerbaijan')}}</span>
                <i class="fa-solid fa-angle-down"></i>
                <ul class="footer__subs--dropdown">
                    <li>{{__('site.footer_azerbaijan')}}</li>
                    <li>{{__('site.footer_turkey')}}</li>
                    <li>{{__('site.footer_russia')}}</li>
                    <li>{{__('site.footer_abd')}}</li>
                    <li>{{__('site.footer_iran')}}</li>
                    <li>{{__('site.footer_uk')}}</li>
                </ul>
            </div>
            <input type="text" placeholder="Your E-mail Address">
            <button class="footer__subs--btn">{{__('site.send')}}</button>
        </form>
    </section>
    <div class="footer__main container">
        <div>
            <h5>{{__('site.footer_corporate')}}</h5>
            <nav>
                <ul>

                    <li>
                        <a href="#">{{__('site.about')}}</a>
                    </li>

                        <li>
                        <a href="#">{{__('site.contact')}}</a>
                    </li>
                    <li>
                        <a href="#">{{__('site.blog')}}</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div>
            <h5>{{__('site.contact')}}</h5>
            <ul>
                <li>
                    <span>{{__('site.address')}} :</span>
                    <span> Ankara Caddesi No: 306 Seyhli</span>
                </li>
                <li>
                    <p>Pendik 34906 İSTANBUL</p>

                </li>
                <li>
                    <span>{{__('site.number')}} :</span>
                    <a href="tel:+902163785000"> +90 (216) 378 50 00</a>
                </li>

                <li>
                    <span>{{__('contact.email')}} : </span>
                    <a href="mailto:gedik@gedik.com.tr"> gedik@gedik.com.tr</a>
                </li>
            </ul>
        </div>
        <div>
            <h5>{{__('site.companies')}}</h5>
            <ul>

                <li>
                    <a href="#">Gedik Welding</a>
                </li>
                <li>
                    <a href="#">Gedik Advanced Casting Technologies</a>
                </li>
                <li>
                    <a href="#">Istanbul Gedik University</a>
                </li>


            </ul>
        </div>
        <div>
            <h5>{{__('site.social-media')}}</h5>
            <ul>
                <li>
                    <a href="#">Facebook</a>
                </li>
                <li>
                    <a href="#">Twitter</a>
                </li>
                <li>
                    <a href="#">Linkedin</a>
                </li>
                <li>
                    <a href="#">Instagram</a>
                </li>
                <li>
                    <a href="#">Youtube</a>
                </li>
            </ul>
        </div>
    </div>
</footer>
