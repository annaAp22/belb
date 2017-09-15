@if($articles->count())
  <section class="container main-advice ">
    <!-- Main advice-->
    <h3 class="main-advice__title">Статьи<span> /Полезные советы</span></h3>
    <div class="advice-articles main-advice__articles">
      @foreach( $articles as $article )
        <div class="advice-articles__article advice-article-preview ">
          <a class="advice-article-preview__link"
             href="{{ route('tag.article', ['tag_sysname' => $tag->sysname, 'sysname' => $article->sysname]) }}">
            <img class="advice-article-preview__image" src="{{ $article->uploads->img->url() }}"/>
            {{--<img class="advice-article-preview__image" src="{{ $article->uploads->img->middle->url() }}"/>--}}
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
      {{--<a class="related-header__listing-link sm" href="#">Читать все статьи<i class="sprite_main sprite_main-icon__arrow_black_to_right"></i></a>--}}
    </div>
    <a class="main-advice__listing-link" href="{{ route('tags', $tag->sysname) }}">Еще статьи</a>
  </section>
@endif