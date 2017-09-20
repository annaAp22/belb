@if($tags->count())
    <div class="sidebar-tags">
        <div class="sidebar-tags__title">По назначению
        </div>
        <div class="sidebar-tags__tags">
            @foreach($tags->take(5)->all() as $tag)
                <a class="sidebar-tags__tag" href="{{ route('tags', $tag->sysname) }}">{{ $tag->name }}</a>
            @endforeach
            <div class="sidebar-tags__hidden">
                @foreach($tags->take(-1 * ($tags->count() - 5))->all() as $tag)
                    <a class="sidebar-tags__tag" href="{{ route('tags', $tag->sysname) }}">{{ $tag->name }}</a>
                @endforeach
            </div>
        </div>
        @if($tags->count() > 5)
            <div class="switch-more-tags js-show-more">
                <span>Показать больше</span>
                <span>Показать меньше</span>
                <i class="sprite sprite-arrow-down-blue2-min"></i>
            </div>
        @endif
    </div>
@endif
