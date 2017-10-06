<?php if($articles->count()): ?>
  <section class="container main-advice ">
    <!-- Main advice-->
    <h3 class="main-advice__title">Статьи<span> /Полезные советы</span></h3>
    <div class="advice-articles main-advice__articles">
      <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="advice-articles__article advice-article-preview ">
          <a class="advice-article-preview__link"
             href="<?php echo e(route('tag.article', ['tag_sysname' => $tag->sysname, 'sysname' => $article->sysname])); ?>">
            <div class="advice-article-preview__image">
              <img src="<?php echo e($article->uploads->img->url()); ?>"/>
            
            </div>
            <div class="advice-article-preview__caption">
              <div class="advice-article-preview__title"><?php echo e($article->name); ?>

              </div>
              <div class="advice-article-preview__preview-text"><?php echo e($article->descr); ?>

              </div>
              <div class="advice-article-preview__lnk">Читать
              </div>
            </div>
          </a>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      
    </div>
    <a class="main-advice__listing-link" href="<?php echo e(route('tags', $tag->sysname)); ?>">Еще статьи</a>
  </section>
<?php endif; ?>