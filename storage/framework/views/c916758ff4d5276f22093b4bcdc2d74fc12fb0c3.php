<?php if(isset($news)): ?>
    <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="article-preview article-preview_news articles__article">
            <a class="article-preview__image" href="<?php echo e(route('news.record', ['sysname' => $article->sysname])); ?>"><img src="<?php echo e($article->uploads->img->preview->url()); ?>"/></a>
            <div class="article-preview__title"><?php echo e($article->name); ?></div>
            <div class="article-preview__preview-text"><?php echo e(App\Helpers\russianDate($article->date)); ?></div>
            <a class="btn btn_read-full" href="<?php echo e(route('news.record', $article->sysname)); ?>">Смотреть</a>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>