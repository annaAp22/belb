@if($articles->count())
  @if($config['tag_id'])
   <div class="plus-articles">
      {{--<div class="plus-header plus-articles__header">--}}
        {{--<div class="plus-header__title">Полезно<span>\ знать</span>--}}
        {{--</div>--}}
        {{--<a class="plus-header__listing-link" href="{{ route('articles') }}">Читать все статьи<i--}}
              {{--class="sprite sprite-arrow-r-blue-min"></i></a>--}}
      {{--</div>--}}
      <div class="articles articles_plus plus-articles__articles">
        @foreach($articles as $article)
          <div class="article-preview article-preview_plus articles__article">
            <a class="article-preview__image" href="{{ route('article', $article->sysname) }}">
              <img src="{{ $article->uploads->img->preview->url() }}"/>
            </a>
            <div class="article-preview__title">{{ $article->name }}</div>
            <div class="article-preview__preview-text">{{ $article->descr }}</div>
            <a class="btn btn_read-full" href="{{ route('article', $article->sysname) }}">Читать</a>
          </div>
        @endforeach
      </div>
    </div>
  @else
    <section class="container main-advice ">
      <!-- Main advice-->
      <h3 class="main-advice__title">Статьи<span> /Полезные советы</span></h3>
      <div class="advice-articles main-advice__articles">
        @foreach( $articles as $article )
          <div class="advice-articles__article advice-article-preview ">
            <a class="advice-article-preview__link"
               href="{{ route('tag.article', ['tag_sysname' => $tag->sysname, 'sysname' => $article->sysname]) }}">
              <div class="advice-article-preview__image">
                <picture>
                  <source media="(max-width: 839px)"
                          srcset="{{ $article->uploads->img->small->url() }}">
                  <img src="{{ $article->uploads->img->url() }}"/>
                </picture>
                {{--<img src="{{ $article->uploads->img->url() }}"/>--}}
                {{--<img class="advice-article-preview__image" src="{{ $article->uploads->img->middle->url() }}"/>--}}
              </div>
              <div class="advice-article-preview__caption">
                <div class="advice-article-preview__title">{{ $article->name }}
                </div>
                <div class="advice-article-preview__preview-text">{{ $article->descr }}
                </div>
                <div class="advice-article-preview__lnk">Читать
                </div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
      <a class="main-advice__link" href="{{ route('tags', $tag->sysname) }}">Еще статьи</a>
    </section>
  @endif
@endif