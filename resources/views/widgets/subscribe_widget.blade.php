<!-- Subscription-->
<div class="subscription">
    <div class="subscription__image">
        <img src="/img/relax.png" width="953" height="520" alt="Изображение - Подпишитесь и получите скидку"/>
    </div>
    <form class="subscription__form js-form-ajax" action="{{route('ajax.subscribe')}}" method="post" enctype="application/x-www-form-urlencoded">
        {{ csrf_field() }}
        <div class="subscription__header">
            {{--<div class="subscription__percent-icon">%</div>--}}
            <i class="subscription__icon sprite sprite-sale"></i>
            <div class="subscription__title">Подпишитесь и получите скидку до 50%</div>
        </div>
        <div class="subscription__text">
            Подпишитесь на нашу рассылку и будьте первым, кто получит самые свежие новости скидках, новинках и выгодных предложениях!
        </div>
        <div class="subscription__input-group"><input class="subscription__input" type="text" name="email" placeholder="Ваша электронная почта..."/>
            <button onclick="fbq('track', 'Lead'); return true;" class="btn btn_blue" type="submit"><span>Оформить подписку</span></button>
        </div>
    </form>
</div>
