<!-- Stars rating-->
@php $comments = $product->comments->first(); @endphp
<div class="product-rating">
    <span class="product-rating__count sprite sprite-comment-bubble-min">{{ ($comments) ? $comments->count : 0 }}</span>
    @for($i=1;$i<=5;$i++)
        <div class="icon-fade product-rating__star">
            @if($comments && $i <= $comments->avg)
                <i class="sprite sprite-star-blue-min"></i>
            @else
                <i class="sprite sprite-star-white-min"></i>
            @endif
        </div>
    @endfor
</div>