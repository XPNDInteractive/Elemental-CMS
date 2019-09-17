<?php $__env->startSection('content'); ?>
    <section class="excerpt py-5 mt-5">
        <div class="container">
            
        </div>
    </section>
    
    <section class="py-5 w-100">
       
        <div class="container">
            <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($field->type !== "image"): ?>
                    <?php echo $field->value; ?>

                <?php else: ?>
                    <img class="w-100 mb-5" src="<?php echo e($field->value); ?>"/>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
       
    </section>
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.base.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>