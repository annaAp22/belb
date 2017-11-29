<header>
    {{--<div class="line line_lg"></div>--}}
    <div class="container ">
        <div class="header">
            <!-- Schedule -->
            {{--<div class="header__time">с {{ $global_settings['schedule']->value['start_workday'] }} до {{ $global_settings['schedule']->value['end_workday'] }} без выходных</div>--}}

            <!-- Hamburger -->
            <div class="header__hamburger">
                <div class="hamburger js-toggle-sidebar" data-target=".js-nav-visible">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

            <!-- Site logo -->
            <a class="header__logo" href="/">
                <img src="/img/belberg_logo.svg" alt="belberg_logo"/>
            </a>


      {{-- City choose --}}
      <div class="header__city">
                <span class="js-toggle-active-target" data-target=".js-geo-city-widget">
                    <i class="sprite sprite-locate-places-min"></i>
                      <span>{{ $user_city }}</span>
                     <i class="sprite sprite-arrow-dwn-min"></i>
                </span>

        {{-- Choose city popup --}}
        @widget('SelectCity')
      </div>

      <!-- Search Start -->
      <form id="search" class="header__search form-search" method="POST" action="{{ route('search') }}">
        {{ csrf_field() }}
        <input type="search" name="text" placeholder="Поиск по товарам..."/>
        <button class="icon-fade " type="submit">
          <i class="sprite sprite-search-icon-min normal"></i>
          <i class="sprite sprite-search-icon-min active"></i>
        </button>
      </form>
      <!-- Search End -->

      {{-- Phones --}}
      <div class="header__phones">
        {{--<div>--}}
        {{--<i>--}}
        {{--<a target="_blank" href="https://api.whatsapp.com/send?phone={{ $global_settings['phone_number']->number['msk'] }}" rel="nofollow" class="sprite_main sprite_main-header__phones_whatsapp messenger"></a>--}}
        {{--</i>--}}
        {{--<i>--}}
        {{--<a target="_blank" href="https://mssg.me/belberg" rel="nofollow" class="sprite_main sprite_main-header__phones_viber messenger"></a>--}}
        {{--</i>--}}
        {{--&nbsp;--}}
        {{--</div>--}}
        <div class="header__item"><i
              class="sprite sprite-phone-icon-min"></i>{!! $global_settings['phone_number']->value['msk'] !!}<br/>
          <span>с {{ $global_settings['schedule']->value['start_workday'] }}
            до {{ $global_settings['schedule']->value['end_workday'] }} без выходных</span>
        </div>
        @if( isset($global_settings['phone_number']->value['free']))
          <div class="header__item"><i
                class="sprite sprite-phone-icon-min"></i>{!! $global_settings['phone_number']->value['free'] !!}
            <br/><span>Бесплатно по России</span>
          </div>
        @endif
      </div>


      <div class="header__basket">
        {{-- WishList--}}
        <a href="{{ route('bookmarks') }}" class="js-hover-notice">


          <div class="count count_wishlist @if($countD = count($defer)){{'active'}}@endif">
            <span class="js-wishlist-quantity">{{ $countD }}</span>
          </div>


          {{-- Icon--}}
          <span class="icon-fade header-wishlist">
                        <i class="sprite sprite-favorite-icon-min normal"></i>
                        <i class="sprite sprite-favorite-icon-min active"></i>
                    </span>

          {{-- Popup --}}
          <span class="popup-notice popup-notice_wishlist-header">
                        <span class="popup-notice__triangle">▼</span>
                        <span class="popup-notice__text">Отложенное</span>
                    </span>
        </a>

        {{-- Seen products --}}
        <a href="{{ route('seen') }}" class="js-hover-notice">

          @if($countS = count($seen))
            <div class="count count_seen">
              <span class="js-seen-quantity">{{ $countS }}</span>
            </div>
          @endif

          {{-- Icon--}}
          <span class="icon-fade seen">
                        <i class="sprite sprite-icon-eye-min normal"></i>
                        <i class="sprite sprite-icon-eye-min active"></i>
                    </span>

          {{-- Poupup--}}
          <span class="popup-notice popup-notice_wishlist-header">
                        <span class="popup-notice__triangle">▼</span>
                        <span class="popup-notice__text">Просмотренное</span>
                    </span>
        </a>
{{--MOBIL--}}
        <div class="header__search-btn">
          <i class="icon sprite sprite-search-icon-min js-toggle-active-target js-input-focus" data-target=".js-search-dropdown" data-focus="#js-search-input"></i>
          <div class="wrapper js-search-dropdown">
            <form class="form-search" method="POST" action="{{ route('search') }}">
              {{ csrf_field() }}
              <button class="icon-fade" type="submit">
                <i class="sprite sprite-search-icon-min normal"></i>
                <i class="sprite sprite-search-icon-min active"></i>
              </button>
              <input id="js-search-input" type="search" name="text" placeholder="Поиск по товарам..."/>
            </form>
          </div>
        </div>
        {{--  <form id="search" class="header__search form-search" method="POST" action="{{ route('search') }}">
        {{ csrf_field() }}
        <input type="search" name="text" placeholder="Поиск по товарам..."/>
        <button class="icon-fade " type="submit">
          <i class="sprite sprite-search-icon-min normal"></i>
          <i class="sprite sprite-search-icon-min active"></i>
        </button>
      </form>
        --}}
        <div class="header__phone-menu">
          <i class="icon sprite sprite-phone-icon-min js-toggle-active-target" data-target=".js-phone-dropdown"></i>
          <div class="wrapper js-phone-dropdown">
            {{--<a target="_blank" href="https://mssg.me/fit2u" rel="nofollow" class="messenger">--}}
              {{--<div class="sprite_main sprite_main-social_32_whatsapp"></div>--}}
              {{--<div class="sprite_main sprite_main-social_32_viber"></div>--}}
              {{--<div class="sprite_main sprite_main-social_32_vk"></div>--}}
              {{--<div class="sprite_main sprite_main-social_32_telegram"></div>--}}
            {{--</a>--}}
            {{--<div class="time">с 10 до 20 <br> без выходных</div>--}}
            {{--<a class="phone roistat-phone" href="tel:+78002221546">--}}
              {{--<div>8 (800) 222-15-46</div>--}}
              {{--<span>Бесплатно по России</span>--}}
            {{--</a>--}}
            <div class="header__itm">
              <i class="sprite sprite-phone-icon-min"></i>{!! $global_settings['phone_number']->value['msk'] !!}<br/>
              <span>с {{ $global_settings['schedule']->value['start_workday'] }}
                до {{ $global_settings['schedule']->value['end_workday'] }} без выходных</span>
            </div>
            @if( isset($global_settings['phone_number']->value['free']))
              <div class="header__itm"><i
                    class="sprite sprite-phone-icon-min"></i>{!! $global_settings['phone_number']->value['free'] !!}
                <br/><span>Бесплатно по России</span>
              </div>
            @endif
          </div>
        </div>
        {{--MOBIL--/}}
        {{-- Basket--}}
        @widget('HeaderBasket')

      </div>
      <div class="hr-1">
        <div></div>
      </div>
      @widget('CatalogWidget', ['type' => 'headerNavigation'])
    <!-- Site login-->
      {{--<div class="header__enter js-toggle-active" href="#">--}}
      {{--<i class="sprite_main sprite_main-header__enter"></i>--}}
      {{--<span class="js-user-name">{{Auth::check()?Auth::user()->name:'Войти / Вступить'}}</span>--}}
      {{--<div class="dropdown">--}}
      {{--<div id="js-not-autorized" @if(Auth::check()) hidden @endif>--}}
      {{--<a id="js-user-login" class= "js-action-link" data-modal="login" data-url="{{route('ajax.modal')}}">Войти в систему</a>--}}
      {{--<a id="js-user-register" class="js-action-link" data-modal="registration" data-url="{{route('ajax.modal')}}">Создать кабинет</a>--}}
      {{--</div>--}}
      {{--<div id="js-autorized"  @if(!Auth::check()) hidden @endif>--}}
      {{--<a href="{{route('room')}}">Мои данные</a>--}}
      {{--<a href="{{route('orders-history')}}">Мои заказы</a>--}}
      {{--<a  class="js-action-link" data-url="{{ route('ajax.logout') }}">Выйти</a>--}}
      {{--</div>--}}
      {{--</div>--}}
      {{--</div>--}}
      <div class="vl"></div>
    </div>
  </div>

  {{--@widget('CatalogWidget')--}}
</header>