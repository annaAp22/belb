<aside class="sidebar">

    
    <?php echo app('arrilot.widget')->run('ListingCatalog'); ?>
    <?php if(in_array(Route::currentRouteName(), ['seen', 'bookmarks'])): ?>
        <?php echo app('arrilot.widget')->run('TagsWidget', ['products' => $products]); ?>
    <?php else: ?>
        <?php echo app('arrilot.widget')->run('TagsWidget'); ?>
    <?php endif; ?>
    <?php echo app('arrilot.widget')->run('BannerLeftWidget'); ?>
</aside>