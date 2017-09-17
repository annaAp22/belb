<div class="navigation-footer__column navigation-footer__column_dropdown">
    <div class="navigation-footer__title js-toggle-active">{{$config['page_title']}}<i class="sprite sprite-arrow-down-min"></i>
    </div>
    <ul>
        @include('blocks.info-additional')
        @foreach($pages as $page)
            <li><a href="{{route('page', $page->sysname)}}">{{$page->name}}</a></li>
        @endforeach
    </ul>
</div>

