<div class="related-articles">
    <div class="related-header related-articles__header">
        <div class="related-header__title">Полезно<span>\ знать</span>
        </div><a class="related-header__listing-link" href="<?php echo e(route('articles')); ?>">Читать все статьи<i class="sprite sprite-arrow-r-blue-min"></i></a>
    </div>
    <div class="articles articles_related related-articles__articles">
        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="article-preview article-preview_related articles__article">
                <a class="article-preview__image" href="<?php echo e(route('article', $article->sysname)); ?>"><img src="<?php echo e($article->uploads->img->preview->url()); ?>"/></a>
                <div class="article-preview__title"><?php echo e($article->name); ?></div>
                <div class="article-preview__preview-text"><?php echo e($article->descr); ?></div>
                <a class="btn btn_read-full" href="<?php echo e(route('article', $article->sysname)); ?>">Читать</a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
