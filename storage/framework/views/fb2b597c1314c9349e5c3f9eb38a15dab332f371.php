<?php $__env->startSection('breadcrumbs'); ?>
  <?php if( isset($tag) ): ?>
    <?php echo Breadcrumbs::render('articles.tag.article', $tag, $page); ?>

  <?php else: ?>
    <?php echo Breadcrumbs::render('article', $page); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <main>
    <div class="container">
      <?php echo $__env->make('blocks.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <section class="content">
        <div class="container-in">
          <div class="header-listing">
            <h1><?php echo e($page->name); ?></h1>

            <!-- Back to shopping link-->
            
            
            
            
            
            
            
          </div>

          <div class="page-text article-detail clearfix-after">
            <div class="article-detail__image">
              <img class="page-text__image" src="<?php echo e($page->uploads->img->preview->url()); ?>" alt="<?php echo e($page->name); ?>">

              <!-- Share-->
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
            </div>
            <div class="article-detail__text">
              <?php echo $page->text; ?>

            </div>
          </div>
          <?php 
            $category = $page->categories()->first();
           ?>
          <?php if($category): ?>
            <section class="article__category-offers">
              <div class="article__category-txt">
                <h3><?php echo e($category->title); ?></h3>
                <p><?php echo e($category->text_preview); ?></p>
                <a>Выбрать</a>
              </div>
              
              <img class="article__category-img" src="<?php echo e($category->uploads->img->url()); ?>" alt="<?php echo e($category->name); ?>">
              

            </section>
          <?php endif; ?>
          <div class="related-articles related-articles_content">
            <h3>Читайте также:</h3>
            <div class="articles articles--belb js-container-article">
              <?php echo $__env->make('articles.list-belb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
          </div>

        </div>
      </section>
      <section class="content-full-width">
        <?php echo app('arrilot.widget')->run('SubscribeWidget'); ?>
      </section>
    </div>
  </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>