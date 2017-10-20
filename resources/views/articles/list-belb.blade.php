@foreach($articles as $item)
  @if( isset($tag) )
    <a href="{{ route('tag.article', ['sysname' => $item->sysname, 'tag_sysname' => $tag->sysname]) }}"
       class="articles-itm">
      @else
        <a href="{{ route('article', ['sysname' => $item->sysname]) }}" class="articles-itm">
          @endif

          <div class="articles-itm__image">
            <div class="img-wrapper">
              <div class="img" style="background-image:url( '{{ $item->uploads->img->small->url() }}' )"></div>
            </div>
          </div>
          <div class="articles-itm__content">
            <h4 class="articles-itm__caption">{{$item->name}}</h4>
            <div class="articles-itm__text">{{$item->descr}}</div>
            <p>Читать статью</p>
          </div>
        </a>
@endforeach
