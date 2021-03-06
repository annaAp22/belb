<div class="nav-pages js-pages">
    {{-- Delivery --}}
    <a class="nav-pages__item nav-pages__item " href="{{ route('delivery') }}"><span>Доставка и оплата</span></a>
    {{-- Articles --}}
    {{--<a class="nav-pages__item" href="{{ route('articles') }}"><span>Статьи</span></a>--}}
    {{-- Reviews --}}
    {{--<a class="nav-pages__item" href="{{ route('reviews') }}"><span>Отзывы</span></a>--}}
    @if($help->count())
        {{-- Help pages --}}
        <div class="nav-pages__item js-toggle-active" data-reset=".js-catalog"><span>Помощь</span><i class="sprite sprite-arrow-down-blue2-min"></i>
            <ul class="nav-pages__dropdown">
                {{-- MD down visible --}}
                {{--<li><button class="btn btn_more"><i class="sprite sprite-arrow-top-min"></i><span>Вернуться назад</span></button></li>--}}
                {{--<li class="mobile-sidebar__title">Помощь</li>--}}
                <li>
                <a class="mobile-sidebar__title2-back" ><span>Помощь</span> <i class="sprite sprite-arrow-down-blue2-min"></i>
                </a>
                </li>
                @foreach($help as $page)
                    <li><a href="{{ route('page', ['sysname' => $page->sysname]) }}">{{ $page->name }}</a></li>
                @endforeach
            </ul>
        </div>
    @endif

    <a class="nav-pages__item" href="{{ route('news') }}"><span>Акции</span></a>
    {{--<a class="nav-pages__item" href="{{ route('reviews') }}"><span>Отзывы</span></a>--}}
    {{--<a class="nav-pages__item" href="{{ route('news') }}"><span>Наши клиенты</span></a>--}}
    {{--<a class="nav-pages__item" href="{{ route('page', ['sysname' => 'shop_in_moscow']) }}"><span>Услуги</span></a>--}}
    {{-- Contacts --}}
    <a class="nav-pages__item" href="{{ route('contacts') }}"><span>Контакты</span></a>

    {{-- Info pages --}}
    <div class="nav-pages__item js-toggle-active" data-reset=".js-catalog-belb">
        <span>Ещё</span><i class="sprite sprite-arrow-down-blue2-min"></i>

        <ul class="nav-pages__dropdown">
            {{-- MD down visible --}}
            {{--<li><button class="btn btn_more"><i class="sprite sprite-arrow-top-min"></i><span>Вернуться назад</span></button></li>--}}
            {{--<li class="mobile-sidebar__title">Информация</li>--}}
            <li>
                <a class="mobile-sidebar__title2-back" ><span>Информация</span> <i class="sprite sprite-arrow-down-blue2-min"></i>
                </a>
            </li>
            @include('blocks.info-additional')
            {{-- Static pages --}}
            @foreach($info as $page)
                <li><a href="{{ route('page', ['sysname' => $page->sysname]) }}">{{ $page->name }}</a></li>
            @endforeach

        </ul>
    </div>
</div>