<div>
    <form class="header__search">
        <div class="header__search--input">
            <input wire:model.live="search" type="text" placeholder="{{__('search.product')}}" id="search_products" name="search_products">
        </div>
        <button class="header__search--btn">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </form>

    @if ($found_products)
    <ul class="search_list">
        @foreach($found_products as $product)
        <li ware:key="{{$product->id}}"><a href="{{route('client.product.detail', $product->id)}}">
                <img src="{{asset($product->image)}}" alt="">
                <p>{{$product->title}}</p>
            </a>
        </li>
        @endforeach
    </ul>
    @endif
</div>
