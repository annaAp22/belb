<?php if($articles->count()): ?>
  <?php if($config['tag_id']): ?>
   <div class="plus-articles">
      
        
        
        
              
      
      <div class="articles articles_plus plus-articles__articles">
        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="article-preview article-preview_plus articles__article">
            <a class="article-preview__image" href="<?php echo e(route('article', $article->sysname)); ?>">
              <img src="<?php echo e($article->uploads->img->preview->url()); ?>"/>
            </a>
            <div class="article-preview__title"><?php echo e($article->name); ?></div>
            <div class="article-preview__preview-text"><?php echo e($article->descr); ?></div>
            <a class="btn btn_read-full" href="<?php echo e(route('article', $article->sysname)); ?>">Читать</a>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  <?php else: ?>
    <section class="container main-advice ">
      <!-- Main advice-->
      <h3 class="main-advice__title">Статьи<span> /Полезные советы</span></h3>
      <div class="advice-articles main-advice__articles">
        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="advice-articles__article advice-article-preview ">
            <a class="advice-article-preview__link"
               href="<?php echo e(route('tag.article', ['tag_sysname' => $tag->sysname, 'sysname' => $article->sysname])); ?>">
              <div class="advice-article-preview__image">
                <picture>
                  <source media="(max-width: 839px)"
                          srcset="<?php echo e($article->uploads->img->small->url()); ?>">
                  <img src="<?php echo e($article->uploads->img->url()); ?>"/>
                </picture>
                
                
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
      <a class="main-advice__link" href="<?php echo e(route('tags', $tag->sysname)); ?>">Еще статьи</a>
    </section>
  <?php endif; ?>
<?php endif; ?>