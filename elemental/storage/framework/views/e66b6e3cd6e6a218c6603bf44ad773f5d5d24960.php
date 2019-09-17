<?php $__env->startSection('content'); ?>
    <section class="excerpt py-5 mt-5">
        <div class="container">
            
        </div>
    </section>
    
    <section class="blog py-5">
        <div class="container">
            
            <div class="row m-0 w-100 py-5 post ">
                  <div class="row m-0  w-100 align-items-center">
                    <h1><?php echo e($post->title); ?></h1>
                    <p class="ml-auto">Created by <span><?php echo e($post->users()->first()->name); ?></span> on <span><?php echo e($post->created_at); ?></span></p>
                    
                   
                </div>
                <div class="col-12 p-0">
                     <?php if(!is_null($post->media()->first())): ?>
                        <img class="w-100" src="<?php echo e($post->media()->first()->path); ?>"/>
                     <?php endif; ?>
                </div>
              
                <p class="mt-5"><?php echo $post->content; ?></p>
            </div>
          
           
        </div>
    </section>
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.base.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>