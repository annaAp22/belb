{{--@foreach($categories as $category)--}}
{{--<div class="navigation-footer__column navigation-footer__column_dropdown">--}}
    {{--<div class="navigation-footer__title js-toggle-active">{{$category->name}}<i class="sprite_main sprite_main-icon__arrow_green_down"></i>--}}
    {{--</div>--}}
    {{--<ul>--}}
        {{--@if(count($category->children))--}}
            {{--@foreach($category->children as $item)--}}
                {{--@if($item->name == 'Одежда')--}}
                    {{--@break--}}
                {{--@endif--}}
            {{--@endforeach--}}
            {{--@foreach($item->children as $subItem)--}}
                {{--<li>--}}
                    {{--<a href="{{route('catalog', $subItem->sysname)}}">{{$subItem->name}}</a>--}}
                {{--</li>--}}
            {{--@endforeach--}}
        {{--@endif--}}
    {{--</ul>--}}
{{--</div>--}}
{{--@endforeach--}}
{{----}}
<div class="navigation-footer__column navigation-footer__column_dropdown">
  <div class="navigation-footer__title js-toggle-active">Каталог товаров<i
        class="sprite sprite-arrow-down-min"></i>
  </div>
  <ul>
    @foreach($categories as $category)
      <li>
        <a href="{{route('catalog', $category->sysname)}}">{{$category->name}}</a>
      </li>
    @endforeach
  </ul>
</div>