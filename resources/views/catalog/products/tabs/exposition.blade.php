<!-- exposition tabulator -->
<div class="tabulator-details tabulator-details--exp js-tabulator">
    <div class="tab-wrapper">
        <label class="tab js-tab-active active">
            <span>Отзывы -<strong> {{ $comments->total() }}</strong></span>
        </label>
        <label class="tab js-tab-active ">
            <span>Характеристики</span>
        </label>
        <label class="tab js-tab-active">
            <span>Описание</span>
        </label>
        <label class="tab js-tab-active js-action-link" data-url="{{route('ajax.page', ['sysname' => 'delivery-mini'])}}">
            <span>Доставка и оплата</span>
        </label>
    </div>
    <div class="page-wrapper">
        <div class="page js-tab-page active" data-complete="1">
            <!-- Reviews-->
            <div  class="product-reviews container-in active js-reviews" data-count="{{$comments->count()}}">
                <!-- Reviews items-->
                @if($comments->count())
                    <div class="js-container-comments wrapper">
                        @include('catalog.products.comments')
                    </div>
                @else
                <!-- Empty reviews-->
                    <div class="reviews-empty"><i class="sprite_main sprite_main-empty-reviews-arrow-gray"></i>
                        <div class="reviews-empty__title">Отзывов пока что нет
                        </div>
                        <div class="reviews-empty__text">Будьте первым, кто поделится своим мнением о товаре. Ваш отзыв внесет ценный вклад в развитие сервиса
                        </div>
                        <div class="product-rating">
                            <div class="icon-fade product-rating__star active"><i class="sprite_main sprite_main-product__star normal"></i><i class="sprite_main sprite_main-product__star_active active"></i>
                            </div>
                            <div class="icon-fade product-rating__star active"><i class="sprite_main sprite_main-product__star normal"></i><i class="sprite_main sprite_main-product__star_active active"></i>
                            </div>
                            <div class="icon-fade product-rating__star active"><i class="sprite_main sprite_main-product__star normal"></i><i class="sprite_main sprite_main-product__star_active active"></i>
                            </div>
                            <div class="icon-fade product-rating__star active"><i class="sprite_main sprite_main-product__star normal"></i><i class="sprite_main sprite_main-product__star_active active"></i>
                            </div>
                            <div class="icon-fade product-rating__star"><i class="sprite_main sprite_main-product__star normal"></i><i class="sprite_main sprite_main-product__star_active active"></i>
                            </div>
                        </div>
                    </div>
                @endif
            <!-- Reviews navigation-->
                @if($comments->lastPage() > $comments->currentPage())
                    <div class="product-reviews-navigation js-pagination-comments">
                        <button class="btn btn_more js-action-link"
                                data-url="{{route('ajax.product.comments')}}"
                                data-product_id="{{$product->id}}"
                                data-page="{{$comments->currentPage() + 1}}">
                            <span class="text">Показать еще</span>
                            <span class="count js-items-count">({{min($comments->total() - ($comments->currentPage() * $comments->perPage()), $comments->perPage())}})</span><i class="sprite_main sprite_main-icon__arrow_green_down"></i>
                        </button>
                        <button class="btn btn_show-all js-action-link"
                                data-url="{{route('ajax.product.comments')}}"
                                data-product_id="{{$product->id}}"
                                data-page="1">
                            <span>Показать все</span><i class="sprite_main sprite_main-icon__arrow_green_down"></i>
                        </button>
                    </div>
                @endif
            </div>
        </div>

        <div class="page js-tab-page">
            Характеристики
        </div>
        <div class="page js-tab-page">
            {!! $product->text !!}
        </div>
        <div  class="page js-tab-page">
            @if(isset($delivery))
                {!! $delivery->content !!}
            @endif
        </div>
    </div>
</div>