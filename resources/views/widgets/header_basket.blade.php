<a class="basket-lnk" href="{{ route('cart') }}">
    <div class="count">
        <span class="js-cart-quantity">{{ $config['count'] }}</span>
    </div>
    <span class="icon-fade basket">
        <i class="sprite sprite-cart-icon-min normal"></i>
        <i class="sprite sprite-cart-icon-min active"></i>
    </span>
</a>