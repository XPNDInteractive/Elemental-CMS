<?php $__env->startSection('content'); ?>
    <section class="excerpt py-5 mt-5">
        <div class="container">
            
        </div>
    </section>
    
    <section class="blog py-5">
        <div class="container">
            
            <div class="row m-0 w-100 py-5 post mb-5 ">
                <div class="col-8 m-0  w-100 align-items-center">
                    <h1><?php echo e($event->name); ?></h1>
                     <p class=""><?php echo e($event->description); ?></p>
                    <p class=""><span>Date/Time:</span> <?php echo e($event->datetime); ?></p>
                    <p class=""><span>Location:</span> <?php echo e($event->address); ?></p>
                    <p class=""><span>Phone:</span> <?php echo e($event->phone); ?></p>
                    <p class=""><span>Email:</span> <?php echo e($event->email); ?></p>

                    
                   
                </div>
                 <div class="col-4 p-0">
                     <?php if(!is_null($event->media()->first())): ?>
                        <img class="w-100" src="<?php echo e($event->media()->first()->path); ?>"/>
                     <?php endif; ?>
                </div>


               
              
                
            </div>
          
           
        </div>
    </section>
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.base.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>