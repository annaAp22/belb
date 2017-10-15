<section class="article-full clearfix-after">
  <div class="article-full__image">
    <img src="{{ $articles->uploads->img->url() }}" alt="{{ $articles->name }}">
  </div>
  <div class="article-full__text">
    <h2>{{ $articles->name }}</h2>
    <p>
      {!! $articles->text !!}
    </p>
  </div>
  <a class="article-full__link " href="{{ route('articles') }}">Читать все статьи<i
        class="sprite sprite-arrow-r-blue-min"></i></a>
</section>
