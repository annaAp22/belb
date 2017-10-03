@if($products->count())
    <!-- Seen products-->
    <div class="products-carousel-block">
        <div class="products-carousel-block__title">Также смотрите:
        </div>
        <div class="products-carousel products-carousel_full-width js-product-carousel">
            <button class="btn btn_carousel-control btn_carousel-control--belb"> <
                {{--<i class="sprite sprite_main-icon_arrow_gray_up"></i>--}}
            </button>
            <div class="products-carousel__wrap">
                <div class="products-carousel__track">
                    @foreach($products as $product)
                        @include('catalog.products.list_item')
                    @endforeach
                </div>
            </div>
            <button class="btn btn_carousel-control btn_carousel-control--belb"> >
                {{--<i class="sprite_main sprite_main-icon_arrow_gray_up"></i>--}}
            </button>
        </div>
    </div>
@endif