<div class="header__navigation">
  <div class="nav-catalog">
    <div class="nav-catalog__btn nav-pages__item js-toggle-active js-catalog-belb " data-reset=".js-pages" ><i
          class="sprite sprite-burg-min nav-pages__icon-burg "></i><span class="mobile-sidebar__title">Каталог товаров</span><i
          class="sprite sprite-arrow-down-blue-min"></i>
      <ul class="nav-pages__dropdown">
        <li><button class="btn btn_more"><i class="sprite_main sprite_main-icon__arrow_to_top"></i><span>Вернуться назад</span></button></li>
        <li class="mobile-sidebar__title">Каталог</li>
        @foreach($categories as $category)
          <li>
            <a href="{{route('catalog', $category->sysname)}}">{{$category->name}}</a>
          </li>
        @endforeach
        {{--<li><a href="{{route('catalog', 'elektroprostyni')}}">Электропростыни</a></li>--}}
      </ul>
    </div>
    {{--@if($categories->contains('name', 'Для женщин'))--}}
    {{--<div class="nav-catalog__item js-toggle-active-target js-women js-catalog" data-target=".js-women" data-reset=".js-men, .js-training"><span>ДЛЯ ЖЕНЩИН</span><i class="sprite_main sprite_main-icon__arrow_green_down"></i>--}}
    {{--</div>--}}
    {{--@endif--}}
    {{--@if($categories->contains('name', 'Для мужчин'))--}}
    {{--<div class="nav-catalog__item js-toggle-active-target js-men js-catalog" data-target=".js-men" data-reset=".js-women, .js-training"><span>ДЛЯ МУЖЧИН</span><i class="sprite_main sprite_main-icon__arrow_green_down"></i>--}}
    {{--</div>--}}
    {{--@endif--}}
    {{--@if($categories->contains('name', 'Тип тренировок'))--}}
    {{--<div class="nav-catalog__item nav-catalog__item_wide js-toggle-active-target js-training js-catalog" data-target=".js-training" data-reset=".js-women, .js-men"><span>ТИП ТРЕНИРОВОК</span><i class="sprite_main sprite_main-icon__arrow_green_down"></i>--}}
    {{--</div>--}}
    {{--@endif--}}
  </div>
  {{-- Pages navigation --}}
  @widget('PageNavigation')

</div>
