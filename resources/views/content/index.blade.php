@extends('layouts.main')
{{--@section('breadcrumbs')--}}
{{--{!!  Breadcrumbs::render('index') !!}--}}
{{--@stop--}}

@section('content')
  <main role="main">
    <!-- Main slider-->
    @if($banners->count())
      <div class="main-slider js-single-banner">
        <div class="main-slider__wrap">
          <div class="main-slider__track">
            @foreach($banners as $banner)
               <a class="main-slider__item" @if($banner->url)href="{{ $banner->url }}"@endif>
                  <img class="main-slider__banner main-slider__banner_md-up"
                       src="{{ $banner->uploads->img->lg->url() }}" alt="" role="presentation"/>
                  <img class="main-slider__banner main-slider__banner_sm"
                       src="{{ $banner->uploads->img->sm->url() }}" alt="" role="presentation"/>
                </a>
            @endforeach
          </div>
        </div>
        <button class="btn btn_main-slider-control left"><i class="sprite sprite-arrow-l-icon-min"></i>
        </button>
        <button class="btn btn_main-slider-control right"><i class="sprite sprite-arrow-r-icon-min"></i>
        </button>
      </div>
    @endif

  <!-- Made from fiber-->
    {{--<div class="colored-bg colored-bg_f3f3f3">--}}
    <div class="container">
      <!-- Main categories-->
      <div class="main-benefits container-in">
      {{--<!-- Sale category -->--}}
      {{--<a class="main-benefits-banner-green" href="{{ route('actions', ['sysname' => 'woman']) }}">--}}
      {{--<span class="main-benefits-banner-green__title">Для  уюта</span>--}}
      {{--<span class="main-benefits-banner-green__text"><span>до</span>--}}
      {{--<span>60 %</span></span>--}}
      {{--<span class="main-benefits-banner-green__link"><span>Смотреть</span><i class="sprite_main sprite_main-button-arrow-right-white"></i></span>--}}
      {{--</a>--}}
      <!-- Women category -->
        @php
          //$category1 = $categories->where('name', 'Для женщин')->first();
           $category1 = $categories->where('id', '1')->first();
           $category2 = $categories->where('id', '50')->first();
           $category3 = $categories->where('id', '54')->first();
        @endphp
      <!-- -->
        <a class="main-benefits-banner main-benefits-banner_dark-gray"
           {{--href="{{ route('catalog', ['sysname' => $category3->sysname]) }}">--}}
           href="{{ route('tags', 'dlya-krasoty') }}">
          {{--<img class="main-benefits-banner__image" src="{{ $men->uploads->img_main->original->url() }}" alt="" role="presentation"/>--}}
          <img class="main-benefits-banner__image" src="/img/img-benef3-min.jpg" alt="" role="presentation"/>
          {{--<span class="main-benefits-banner__caption">--}}
          <span class="main-benefits-banner__title">Для красоты</span>
          {{--<span class="main-benefits-banner__text">Износостойкая, брендовая спортивная одежда</span>--}}
          {{--<button class="btn btn_white main-benefits-banner__link">Смотреть<i class="sprite_main sprite_main-button-arrow-right-black"></i></button>--}}
          {{--</span>--}}
        </a>
        <a class="main-benefits-banner main-benefits-banner_green"
           {{--href="{{ route('catalog', ['sysname' => $category1->sysname]) }}">--}}
          href="{{ route('tags', 'dlya-uyuta') }}">
          {{--<a class="sidebar-tags__tag" href="{{ route('tags', $tag->sysname) }}">{{ $tag->name }}</a>--}}
          {{--<img class="main-benefits-banner__image" src="{{ $women->uploads->img_main->original->url() }}" alt="" role="presentation"/>--}}
          <img class="main-benefits-banner__image" src="/img/img-benef1-min.jpg" alt="" role="presentation"/>
          <span class="main-benefits-banner__title">Для  уюта</span>
          {{--<span class="main-benefits-banner__text">Яркая, стильная и удобная спортивная одежда</span>--}}
          {{--<button class="btn btn_white main-benefits-banner__link">Смотреть<i class="sprite_main sprite_main-button-arrow-right-black"></i></button>--}}

        </a>
        <a class="main-benefits-banner main-benefits-banner_light-gray"
           {{--href="{{ route('catalog', ['sysname' => $category2->sysname]) }}">--}}
          href="{{ route('tags', 'dlya-zdorovya') }}">
          {{--<img class="main-benefits-banner__image" src="{{ $women->uploads->img_main->original->url() }}" alt="" role="presentation"/>--}}
          <img class="main-benefits-banner__image" src="/img/img-benef2-min.jpg" alt="" role="presentation"/>
          <span class="main-benefits-banner__title">Для реабилитации</span>
          {{--<span class="main-benefits-banner__text">Яркая, стильная и удобная спортивная одежда</span>--}}
          {{--<button class="btn btn_white main-benefits-banner__link">Смотреть<i class="sprite_main sprite_main-button-arrow-right-black"></i></button>--}}

        </a>

      </div>
      {{--@include('blocks.best-clothes')--}}
    </div>
    {{--</div>--}}
  <!-- Video and Quality-->
    <div class="container">
      <!-- Video and Quality banner-->
    {{--<div class="video-and-quality container-in">--}}
    {{--<!-- YouTube video-->--}}
    {{--<a data-fancybox class="youtube-video" href="//www.youtube.com/embed/LVDh_iL8YdM?autoplay=1">--}}
    {{--<span class="youtube-video__play"></span>--}}
    {{--<img class="youtube-video__image" src="/img/main-video-min.jpg" alt="" role="presentation"/>--}}
    {{--<span class="youtube-video__title youtube-video__title_top-left-white">Всё, что нужно занать о нашей спортивной одежде</span>--}}
    {{--</a>--}}

    {{--<!-- Quality--><a class="main-quality" href="{{ route('article', ['sysname' => 'iz_chego_shem']) }}"><img class="main-quality__image" src="/img/main-made-super-quality-min.jpg" alt="" role="presentation"/><span class="main-quality__caption"><span class="main-quality__title">Супер Качество</span><span class="main-quality__text">Ткань имеет свойства растягиваться в обоих направлениях. Выводит пот через ткань наружу, оставляя кожу сухой и теплой. Устойчив к зацепкам и закатыванию.</span>--}}
    {{--<button class="btn btn_white">Подробнее<i class="sprite_main sprite_main-button-arrow-right-black"></i>--}}
    {{--</button></span></a>--}}
    {{--</div>--}}
    <!-- Style and Design-->
      {{--<div class="style-and-design container-in">--}}
      {{--<div class="style-and-design__col"><img class="style-and-design__image" src="/img/main-made-style-min.jpg" alt="" role="presentation"/>--}}
      {{--</div>--}}
      {{--<div class="style-and-design__col">--}}
      {{--<div class="style-and-design__border">--}}
      {{--<div class="style-and-design__title"><i class="sprite_main sprite_main-main-style-leaf-gray"></i><span>Стиль и европейский дизайн</span><i class="sprite_main sprite_main-main-style-leaf-gray"></i>--}}
      {{--</div>--}}
      {{--<div class="style-and-design__text">Лучшие дизайнеры спортивной одежды работали над тем, чтобы Вы выглядели стильно и современно. Наша спортивная одежда изготавливается в соответствии с самыми свежими трендами спортивной моды--}}
      {{--</div><a class="btn btn_deep-yellow" href="{{ route('catalog', ['sysname' => $women->sysname]) }}">Перейти в каталог<i class="sprite_main sprite_main-button-arrow-right-black"></i></a>--}}
      {{--</div>--}}
      {{--</div>--}}
      {{--</div>--}}
    </div>
    <!-- spec offers tabulator -->
    <div class="container">
      <section class="main-offers">
        <div class="main-aside">
          <div class="main-aside__item main-aside__item--article ">
            <h3 class="main-aside__header"><i class="sprite sprite-checkbox-pen-min"></i> База знаний
            </h3>
            <a class="main-aside__link main-aside__link--article "
               href="{{ route('articles') }}">
              <img class="main-aside__image" src="/img/article_img-min.jpg" alt="" role="presentation"/>
              <h4 class="main-aside__title">Зеркала Belberg</h4>
              <p class="main-aside__text">
                Бьюти инструмент, благодаря которому забота о себе становится легче, и интереснее...
              </p>
              <span>Читать статьи</span>
            </a>
          </div>
          {{--<div class="main-aside__item main-aside__item--reviews ">--}}
            {{--<h3 class="main-aside__header"><i class="sprite sprite-thumbs-up-hand-symbol-min"></i> Отзывы наших клиентов--}}
            {{--</h3>--}}
            {{--<a class="main-aside__link main-aside__link--reviews "--}}
               {{--href="{{ route('reviews') }}">--}}
              {{--<img class="main-aside__image" src="/img/review_img-min.jpg" alt="" role="presentation"/>--}}
              {{--<h4 class="main-aside__title">Отзывы наших клиентов.</h4>--}}
              {{--<p class="main-aside__text">--}}
                {{--Мы существуем достаточно длительное время и отзывы наших клиентов-это то,чем...--}}
              {{--</p>--}}
              {{--<span>Читать отзывы</span>--}}
            {{--</a>--}}
          {{--</div>--}}
          {{--<div class="main-aside__item main-aside__item--video">--}}
            {{--Видео--}}
          {{--</div>--}}

        </div>
        <div class="main-content">
          <div class="tabulator-offers js-tabulator">
            <div class="tab-wrapper">
              <label class="tab js-tab-active active">
                <span>Хиты</span>
              </label>
              <label class="tab js-tab-active">
                <span>Новинки</span>
              </label>
              <label class="tab js-tab-active">
                <span>Акции</span>
              </label>
            </div>
            <div class="page-wrapper">
              <div class="page js-tab-page active" data-action="widget"
                   data-options='{"config":{"type":"hit"}}' data-url="{{route('ajax.widget')}}"
                   data-name="ProductsSliderWidget" data-callback="productsSliderInit" data-complete="1">
                @widget('ProductsSliderWidget', ['type' => 'hit'])
              </div>
              <div class="page js-tab-page active" data-action="widget"
                   data-options='{"config":{"type":"new"}}' data-url="{{route('ajax.widget')}}"
                   data-name="ProductsSliderWidget" data-callback="productsSliderInit">
              </div>
              <div class="page js-tab-page active" data-action="widget"
                   data-options='{"config":{"type":"act"}}' data-url="{{route('ajax.widget')}}"
                   data-name="ProductsSliderWidget" data-callback="productsSliderInit">
              </div>
            </div>
          </div>
          <div class="main-catalog">
            <h3>Каталог товаров</h3>
            <p class="main-catalog__sub-title">{{$cnt_products}} товаров</p>
            <ul class="main-catalog__list">
              @foreach($categories as $category)
                {{--{{dd($category-> products->count())}}--}}
                <li class="main-catalog__item">
                  <a class="main-catalog__lnk" href="{{route('catalog', $category->sysname)}}">
                    <img src="{{ $category->uploads->img_main->original->url() }}"/>
                    <div class="main-catalog__lnk-top">
                      <div class="main-catalog__top main-catalog__top--1">Более<br>
                        <span>{{$category->getProductsCountAttribute()}}</span><br> товаров
                      </div>
                      <div class="main-catalog__top main-catalog__top--2">Цены от<br>
                        <span>{{$category->getMinPriceAttribute()}}</span></div>
                    </div>
                    <h4>{{$category->name}}</h4>
                    <p class="main-catalog__text">{{$category->text_preview}}</p>
                  </a>
                </li>
              @endforeach
            </ul>
          </div>
        </div>
      </section>
    </div>
    <div class="container main-callback">
        <div class="main-callback__form">
          <form class="form-main-callb js-form-ajax " id="main-callback" action="{{ route('ajax.callback') }}"
                method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="is_multiple" value="1">
            <div class="form-main-callb_title">Есть вопросы о товаре?</div>
            <p class="form-main-callb_text">Оставьте заявку на обратный звонок,и наш специалист свяжется с Вами!</p>
            <div class="form-main-callb_line ">
              {{--<label>Ваше имя: <span class="mod-col-or">*</span></label>--}}
              <input class="js-required-fields input input_text" type="text" name="name" placeholder="Введите Ваше имя..." >
            </div>
            <div class="form-main-callb_line">
              <input class="js-required-fields js-phone input " type="text" name="phone"
                     placeholder="Введите Ваш номер телефона...">
              {{--<script type="text/javascript">--}}
              {{--$('.js-phone').mask("+7 000 000 00 00", {placeholder: "+7 ___ ___ __ __"});--}}
              {{--</script>--}}
            </div>
            <div class="form-main-callb_line">
              <label class="radio radio_box">
                <input class="js-required-fields" name="rating"  type="checkbox" value=1><span
                    class="fake-input"><span></span></span><span class="label">Я соглас(ен/на) на <a target="_blank"
                    href="{{route('page', ['sysname' => 'polzovatelskoe-soglashenie'])}}">обработку персональных данных</a></span>
              </label>
            </div>
            <button class="btn btn_blue-border form-main-callb__btn " type="submit">Готово</button>
         </form>
        </div>
        <div class="main-callback__image">
          {{--<img  src="/img/callb-min.jpg" alt=""/>--}}
        </div>
    </div>
    <section class="main-trust container">
      <h3>Почему нам можно доверять?</h3>
      <div class="main-trust__wrap">
        <ul class="main-trust__items">
          <li class="main-trust__item">
            <h4 class="main-trust__title"><i class="sprite sprite-checked-symbol-min"></i><span>Качество</span></h4>
            <p class="main-trust__text">Немецкое товары проверенные временем .</p>
          </li>
          <li class="main-trust__item">
            <h4 class="main-trust__title"><i class="sprite sprite-checked-symbol-min"></i><span>Гарантия</span></h4>
            <p class="main-trust__text">Гарантия на нашу продукцию от одного года.</p>
          </li>
          <li class="main-trust__item">
            <h4 class="main-trust__title"><i class="sprite sprite-checked-symbol-min"></i><span>Материалы</span></h4>
            <p class="main-trust__text">Наша продукция выполняется из надежных качественных немецких материалов.</p>
          </li>
        </ul>
        <div class="main-trust__img">
          <img src="/img/germany-min.jpg" alt="Германия"/>
        </div>
      </div>
    </section>
    {{--<!-- Main find size-->--}}
    {{--<div class="colored-bg colored-bg_f3f3f3 colored-bg_mt">--}}
    {{--<div class="container">--}}
    {{--<!-- Main benefits-->--}}
    {{--<div class="main-find-size container-in">--}}
    {{--<div class="main-find-size__col">--}}
    {{--<div class="main-find-size__title"><i class="sprite_main sprite_main-main-size-ruller"></i>--}}
    {{--<div><span>Подбор размера по вашим сантиметрам</span><span>Поможем подобрать Вам одежду. Посоветуем лучший вариант. Размер будет точно Вам впору!</span>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="main-find-size-white-block">--}}
    {{--<div class="main-find-size-white-block__image-wrapper">--}}
    {{--<img class="" src="/img/main-size-girl-opened-mouth-min.jpg" alt=""--}}
    {{--role="presentation"/>--}}
    {{--</div>--}}

    {{--<div class="main-find-size-white-block__caption">--}}
    {{--<div class="main-find-size-white-block__title">Всё равно не подошла одежда?--}}
    {{--</div>--}}
    {{--<div class="main-find-size-white-block__text">Не растраивайтесь! Смело возвращайте товар--}}
    {{--назад. Примем без проблем--}}
    {{--</div>--}}
    {{--<a class="btn btn_green-border-900 js-action-link" href="#"--}}
    {{--data-url="{{route('ajax.modal')}}" data-modal="callback">Подобрать одежду</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="main-find-size__col"><img class="main-find-size__image"--}}
    {{--src="/img/main-size-girl-without-head-min.jpg" alt=""--}}
    {{--role="presentation"/>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--@widget('news')--}}

    @widget('adviceWidget')
  </main>
@endsection
