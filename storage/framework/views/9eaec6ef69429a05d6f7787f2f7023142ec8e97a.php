<?php if(isset($category) && $category->children->count()): ?>
	<?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php if($cat->children->count()): ?>
			<?php if(isset($chunk)): ?>
				<?php 
					$chunks = $cat->children->chunk($chunk);
				 ?>

				<?php if(count($chunks)): ?>
					<?php echo $__env->make('catalog.dropdown-column', ['items' => $chunks[0], 'cat_name' => $cat->name], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php for($i =1; $i < count($chunks); $i++): ?>
						<?php echo $__env->make('catalog.dropdown-column-fake', ['items' => $chunks[$i]], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php endfor; ?>
				<?php endif; ?>
			<?php else: ?>
				<?php echo $__env->make('catalog.dropdown-column', ['items' => $cat->children, 'cat_name' => $cat->name], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<?php endif; ?>
		<?php endif; ?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php if(isset($unique_offer)): ?>
	<div class="catalog-dropdown__column">
		<div class="catalog-dropdown__title">Уникальные предложения</div>
		<ul class="ul ul_green-hover">
			<li><a href="<?php echo e(route('new', ['sysname' => $category->sysname])); ?>">Новая коллекция</a></li>
			<li><a href="<?php echo e(route('actions', ['sysname' => $category->sysname])); ?>">Акции</a></li>
			<li><a href="<?php echo e(route('hits', ['sysname' => $category->sysname])); ?>">Хиты продаж</a></li>

            
			
		</ul>
	</div>
	<?php endif; ?>
<?php endif; ?>