<?php $__env->startSection('content'); ?>
    <div class="row tools m-0 p-3 mb-4 align-items-center page-info">
        <div class="col col-md-5 mr-5 p-0">
            <h6 class=" m-0">Admin / Events</h6>
            
        </div>
        
        <a class="btn btn-primary ml-auto" href="<?php echo e(Route('events_create')); ?>">
            Create Event <i class="fas fa-plus"></i>
        </a>
    </div>
    <div class="list">

        
       
        <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
           <a href="<?php echo e(Route('events_update', ["id" => $page->id])); ?>" class="row">
                <div class=" bg-purple text-center py-3" style="width: 52px;">
                    <h6 class="text-white m-0"><?php echo e(strtoupper($page->name[0])); ?></h6>
                </div>
                 <div class="col-2">
                    <?php echo e($page->name); ?>

                </div>
                <div class="col-4">
                    <?php echo str_limit($page->description, 155); ?>

                </div>
                 <div class="col">
                    <?php echo e($page->address); ?>

                </div>
                 <div class="col">
                    <?php echo e($page->phone); ?>

                </div>
                 <div class="col">
                    <?php echo e($page->created_at); ?>

                </div>
                 <div class="col">
                    <?php echo e($page->active == true ? "Active":"Inactive"); ?>

                </div>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   </div>
       

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>