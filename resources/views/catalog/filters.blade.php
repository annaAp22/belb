@if( isset($category) || isset($tag) )
  <form
      action="{{ route(Route::current()->getName(), ['sysname' => isset($category->sysname)?$category->sysname:$tag->sysname]) }}"
      method="post" class="sidebar-filter" id="js-filters">
    {{ csrf_field() }}
    {{-- Hidden inputs --}}
    <input type="hidden" name="filter" value="1">
    {{--<input type="hidden" name="page" value="{{ ($paginator->hasMorePages()) ? $paginator->currentPage() + 1 : '' }}">--}}
    <input type="hidden" name="page" value="1">
    @php
      if(!isset($pageCount)) $pageCount = 1;
    @endphp
    <input type="hidden" name="pageCount" value="{{$pageCount}}">
    @if($category)
      <input type="hidden" name="category_id" value="{{ $category->id }}">
    @elseif($tag)
      <input type="hidden" name="tag_id" value="{{ $tag->id }}">
    @endif
    <input type="hidden" name="sort" value="{{$sort}}">

    <div class="sidebar-filter__title">Фильтры подбора:
    </div>
    <!-- Price filter-->
    @if($maxPrice > $minPrice)
      <div class="sidebar-filter__subtitle">Цена товара:
      </div>
      <div class="range-slider sidebar-filter__item">
        <div class="range-slider__label price"><span>{{ number_format($minPrice, 0, '.', ' ') }} ₽</span><span>{{ number_format($maxPrice, 0, '.', ' ') }}
            ₽</span>
        </div>
        <div class="range-slider__slider" id="js-range-slider" data-range="[{{ $minPrice }},{{ $maxPrice }}]"
             data-start="[{{ $startPrice }},{{ $endPrice }}]">
        </div>
        <div class="range-slider__label text"><span>От</span><span>До</span>
        </div>
        <div class="input" data-currency="₽">
          <input class="input__text js-slider-input" type="text" name="price_from" id="js-price-min"/>
          <input class="input__text js-slider-input" type="text" name="price_to" id="js-price-max"/>
        </div>
      </div>
    @endif
    @if(isset($filters) && $filtersCount = $filters->count())
      @if($material = $filters->where('name', 'Материал')->first())
      <!-- material filter-->
        <div class="sidebar-filter__subtitle">{{ $material->name }}:</div>
        <div class="checkbox-filter sidebar-filter__item">
          @foreach($material->values as $value)
            <label>
              <input type="checkbox" name="attribute[{{ $material->id }}][]" value="{{ $value }}" @if(isset($attributes[$material->id])and(in_array($value, $attributes[$material->id]))) checked @endif/>
              <div class="checkbox-filter__checkbox">
              </div>
              <span>{{ $value }}</span>
            </label>
          @endforeach
        </div>
      @endif
      @if($sizes = $filters->where('name', 'Размеры')->first())
      <!-- Size filter-->
        <div class="sidebar-filter__subtitle">{{ $sizes->name }}:</div>
        <div class="size-filter sidebar-filter__item square-filter js-square-check-filter">
          @foreach($sizes->values as $size)
            <div
                class="size-filter__size js-square @if(isset($attributes[$sizes->id])and(in_array('"'.$size.'"', $attributes[$sizes->id]))) active @endif">
              <span>{{ $size }}</span>
              <input type="hidden" name="attribute[{{ $sizes->id }}][]" value='"{{ $size }}"'
                     @if(!isset($attributes[$sizes->id])or(!in_array('"'.$size.'"', $attributes[$sizes->id]))) disabled="disabled" @endif/>
            </div>
          @endforeach
        </div>
      @endif
      @if($colors = $filters->where('name', 'Основной цвет')->first())
      <!-- Primary color filter -->
        <div class="sidebar-filter__subtitle">{{ $colors->name }}:</div>
        <div class="color-filter square-filter js-square-check-filter">
          @foreach($colors->values as $color)
            <div
                class="color-filter__color{{ $color == "#ffffff" ? " color-filter__color_white" : "" }} js-square @if(isset($attributes[$colors->id])and(in_array($color, $attributes[$colors->id]))) active @endif"
                style="background-color: {{ $color }};" title="{{ $colors->getColorAttribute($color) }}">
              <input type="hidden" name="attribute[{{ $colors->id }}][]" value="{{ $color }}"
                     @if(!isset($attributes[$colors->id])or(!in_array($color, $attributes[$colors->id]))) disabled="disabled" @endif/>
              <i class="sprite_main sprite_main-listing__filter_color-checked"></i>
            </div>
          @endforeach
        </div>
      @endif

    <!-- Hidden additional filters-->
      {{--<div class="sidebar-filter__hidden">--}}
      {{--<div class="sidebar-filter__subtitle collapsed js-toggle-active">{{ $filter->name }}:<i--}}
      {{--class="sprite_main sprite_main-icon__arrow_green_down"></i></div>--}}

      {{--</div>--}}


    <!-- All other filters -->
      {{--@if($filtersCount > 3)--}}
      @foreach($filters->whereNotIn('name',['Размеры', 'Основной цвет', 'Материал']) as $filter)
        <div class="sidebar-filter__hidden">
          <div class="sidebar-filter__subtitle collapsed js-toggle-active">{{ $filter->name }}:<i
                class="sprite sprite-arrow-down-blue2-min"></i></div>
          @if( $filter['name'] === 'Цвет вставок')
            <div class="color-filter square-filter sidebar-filter__item js-square-check-filter js-hidden">
              @foreach($filter->values as $color)
                <div
                    class="color-filter__color{{ $color == "#ffffff" ? " color-filter__color_white" : "" }} js-square @if(isset($attributes[$colors->id])and(in_array($color, $attributes[$colors->id]))) active @endif"
                    style="background-color: {{ $color }};" title="{{ $colors->getColorAttribute($color) }}">
                  <input type="hidden" name="attribute[{{ $colors->id }}][]" value="{{ $color }}" disabled="disabled"/>
                  <i class="sprite_main sprite_main-listing__filter_color-checked"></i>
                </div>
              @endforeach
            </div>
          @else
            <div class="checkbox-filter sidebar-filter__item">
              @foreach($filter->values as $value)
                 <label>
                  <input type="checkbox" name="attribute[{{ $filter->id }}][]" value="{{ $value }}"/>
                  <div class="checkbox-filter__checkbox">
                  </div>
                  <span>{{ $value }}</span>
                </label>
              @endforeach
            </div>
          @endif
        </div>

      @endforeach
    @section('more_filters')
      <div class="switch-additional-filters js-show-more"><i
            class="sprite_main sprite_main-listing__filter_arrow_down"></i><span>Показать больше</span><span>Скрыть фильтры</span><i
            class="sprite_main sprite_main-listing__filter_arrow_down"></i></div>
    @stop

    @endif

  <!-- Apply filter-->
    <button class="btn btn_blue btn_w100p js-close-filters" name="apply">Применить
    </button>
    <button class="btn btn_reset btn_w100p js-filters-reset" name="reset"><i
          class="sprite sprite-cross-red-min"></i><span>Сбросить фильтры</span>
    </button>
    @yield('more_filters')

  </form>
@endif