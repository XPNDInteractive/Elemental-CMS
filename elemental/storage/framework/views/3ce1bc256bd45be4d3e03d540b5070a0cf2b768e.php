<?php $__env->startSection('content'); ?>


<?php if(!is_null($page->fields()->where("name", 'blog-image')->first())): ?>
    <div class="jumbotron jumbotron-fluid jumbotron-blog" style="background-image: url(<?php echo e($page->fields()->where("name", 'blog-image')->first()->value); ?>)"></div>
<?php else: ?>
    <div class="jumbotron jumbotron-fluid jumbotron-blog"  style="background: url(<?php echo e(url('/')); ?>/storage/media/blog.jpg) 0 0 no-repeat;background-size:cover;"></div>
<?php endif; ?>
<section class="excerpt py-5">
    <div class="container"></div>
</section>
<section class="blog py-5">
    <div class="container">
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row m-0 w-100 py-5 post">
                    <?php if(!is_null($post->media()->first())): ?>
                <div class="col-4">
                    <a href="<?php echo e($post->slug); ?>">
                    
                    <img class="w-100" src="<?php echo e($post->media()->first()->path); ?>"/>
                    
                    </a>
                </div>
                <?php endif; ?>
                <div class="col">
                    <h1><a href="<?php echo e(url('/') . "/". $post->slug); ?>"><?php echo e($post->title); ?></a></h1>
                    
                    
                    
                    <p class="mb-3"><?php echo str_limit(strip_tags($post->content), 355, $end = '...'); ?></p>
                    <p class="details w-100">Created by <span><?php echo e($post->users()->first()->name); ?></span> on <span><?php echo e($post->created_at); ?></span></p>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($posts->links()); ?>

    </div>
</section>
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.base.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>