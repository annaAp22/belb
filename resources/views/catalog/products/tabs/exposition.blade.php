<!-- exposition tabulator -->
<div class="tabulator-details tabulator-details--expo js-tabulator">
    <div class="tab-wrapper">
        <label class="tab js-tab-active active">
            <span>Описание</span>
        </label>
        <label class="tab js-tab-active js-action-link" data-url="{{route('ajax.page', ['sysname' => 'delivery-mini'])}}">
            <span>Доставка и оплата</span>
        </label>
        <label class="tab js-tab-active ">
            <span>Характеристики</span>
        </label>
        <label class="tab js-tab-active ">
            <span>Самовывоз</span>
        </label>
    </div>

    <div class="page-wrapper">
        <div class="page js-tab-page active">
            {!! $product->text !!}
        </div>
        <div id="js-delivery-mini" class="page js-tab-page">
            @if(isset($delivery))
                {!! $delivery->content !!}
            @endif
        </div>
        <div class="page js-tab-page">
            @foreach($product->attributes as $item )
                <div class="page__param-title "><strong>{{$item->name}}:</strong><span class="page__param-value">{{$item->pivot_values}}</span>
                </div>
            @endforeach
        </div>
        <div class="page js-tab-page">
            Самовывоз ..........
        </div>
    </div>
</div>