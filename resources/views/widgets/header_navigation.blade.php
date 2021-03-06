<div class="header__navigation">
  {{--@php--}}
  {{--var_dump($categories);--}}
  {{--@endphp--}}
  <div class="nav-catalog">
    <div class="nav-catalog__btn nav-pages__item js-toggle-active js-catalog-belb " data-reset=".js-pages" ><i
          class="sprite sprite-burg-min nav-pages__icon-burg "></i>
          <span class="mobile-sidebar__title mobile-sidebar__title--catalog">Каталог товаров</span><i
          class="sprite sprite-arrow-down-blue2-min"></i>
      <ul class="nav-pages__dropdown">
        {{--<li><button class="btn btn_more"><i class="sprite sprite-arrow-top-min"></i><span>Вернуться назад</span></button></li>--}}
        {{--<li class="mobile-sidebar__title ">Каталог</li>--}}
        <li>
          <a class="mobile-sidebar__title2-back" ><span>Каталог</span> <i class="sprite sprite-arrow-down-blue2-min"></i>
          </a>
        </li>


        @foreach($categories as $category)
          @if(isset($category) && $category->children->count())
            <li class="nav-catalog__itm js-toggle-active">
              <h5 class="nav-catalog__itm-title" >
                <span>{{ $category->name }}</span><i class="sprite sprite-arrow-down-blue2-min"></i></h5>
              <ul class="nav-catalog__dropdown ">
                @foreach($category->children as $subcat)
                  <li >
                    <a href="{{ route('catalog', $subcat->sysname) }}">{{ $subcat->name }}</a>
                  </li>
                @endforeach
              </ul>
           </li>
          @else
          <li>
            <a href="{{route('catalog', $category->sysname)}}">{{$category->name}}</a>
          </li>
          @endif
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
