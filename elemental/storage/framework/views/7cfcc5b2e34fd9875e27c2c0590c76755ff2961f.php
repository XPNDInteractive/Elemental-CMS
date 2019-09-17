<?php $__env->startSection('content'); ?>



    <section class="excerpt mt-5 py-5">
        <div class="container">
            
        </div>
    </section>
    <section class="blog py-5">
        <div class="container post">
            <h1>Body Esteem Events & Seminars</h1>
             <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row m-0 w-100 py-5 post">
                    <?php if(!is_null($event->media()->first())): ?>
                    <div class="col-4">
                        <a href="<?php echo e($event->slug); ?>">
                       
                        <img class="w-100" src="<?php echo e($event->media()->first()->path); ?>"/>
                       
                        </a>
                    </div>
                    <?php endif; ?>
                    <div class="col">

                        <h1><a href="<?php echo e($event->slug); ?>"><?php echo e($event->name); ?></a></h1>
                        <p class=""><?php echo e($event->description); ?></p>
                        <p class=""><span>Date/Time:</span> <?php echo e($event->datetime); ?></p>
                        <p class=""><span>Location:</span> <?php echo e($event->address); ?></p>
                        <p class=""><span>Phone:</span> <?php echo e($event->phone); ?></p>
                        <p class=""><span>Email:</span> <?php echo e($event->email); ?></p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if($posts->count() > 5): ?>
                <?php echo e($posts->links()); ?>

            <?php endif; ?>
        </div>
    </section>
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.base.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>