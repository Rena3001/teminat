<footer>
    <div class="container">
        <div class="footer_content">
            <div class="footer_subscribe">
                <h2>{{__('word.subscribe')}}</h2>
                <p>{{__('word.notification')}}</p>
                <form class="input_box">
                    <input placeholder="{{__('word.email')}}" type="text" />
                    <button type="submit">{{__('word.send')}}</button>
                </form>
            </div>
            <div class="footer_nav">
                <ul>
                    <li>
                        <p class="nav_heading">{{__('menu.services')}}</p>
                    </li>
                    @if(!empty($models) && count($models) > 0)
                    @foreach ($models as $model)
                    <li><a href="">{{ $model->title }}</a></li>
                    @endforeach
                    @else
                    <li>No services available</li>
                    @endif
                </ul>
                <ul>
                    <li>
                        <p class="nav_heading">{{__('menu.categories')}}</p>
                    </li>
                    @if(!empty($categories) && count($categories) > 0)
                    @foreach ($categories as $category)
                    <li><a href="">{{ $category->title }}</a></li>
                    @endforeach
                    @else
                    <li>No categories available</li>
                    @endif
                </ul>
                <ul>
                    <li>
                        <p class="nav_heading">{{ __('word.contact_us') }}</p>
                    </li>
                    <li>
                        <ul class="footer_social_links">
                            <li>
                                <a href="#"><button><i class="fa-brands fa-facebook-f"></i></button></a>
                            </li>
                            <li>
                                <a href="#"><button><i class="fa-brands fa-instagram"></i></button></a>
                            </li>
                            <li>
                                <a href="#"><button><i class="fa-brands fa-whatsapp"></i></button></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="footer_map">
            @if(!empty($settings))
            {!! $settings->iframe_map !!}
            @endif
        </div>
    </div>
    <div class="footer_copyright">
        <div class="container">
            <p>{{ __('word.copyright') }}</p>
            <p>{{ __('word.year') }}</p>
        </div>
    </div>
</footer>

