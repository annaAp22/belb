<section class="article-full clearfix-after">
  <div class="article-full__image">
    <img src="<?php echo e($articles->uploads->img->url()); ?>" alt="<?php echo e($articles->name); ?>">
  </div>
  <div class="article-full__text">
    <h2><?php echo e($articles->name); ?></h2>
    <p>
      <?php echo $articles->text; ?>

    </p>
  </div>
  <a class="article-full__link " href="<?php echo e(route('articles')); ?>">Читать все статьи<i
        class="sprite sprite-arrow-r-blue-min"></i></a>
</section>
