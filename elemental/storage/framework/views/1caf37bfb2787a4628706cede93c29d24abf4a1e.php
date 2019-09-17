    


<?php $__env->startSection('content'); ?>
    <div class="row tools m-0 p-3 mb-4 align-items-center page-info">
        <div class="col col-md-5 mr-5 p-0">
            <h6 class=" m-0">Admin / Settings</h6>
            
        </div>
      
        
    </div>
    <form action="<?php echo e($action); ?>" method="post">
        <div class="row m-2 m-md-5 p-5 border bg-white">
            <?php if(count($errors->all()) !== 0): ?>
               <div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
                <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <?php endif; ?>
            <?php echo csrf_field(); ?>

            <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-12 col-lg-12 row m-0 justify-content-start align-items-center">
                <label><?php echo e($setting->name); ?></label>
                <input class="form-control <?php echo e($errors->has($setting->name) ? ' is-invalid' : ''); ?>" type="text" name="<?php echo e($setting->id); ?>" value="<?php echo e($setting->value); ?>"/>
                <?php if($errors->has($setting->name)): ?>
                    <span class="invalid-feedback d-block" role="alert">
                        <p class="text-danger"><?php echo e($errors->first($setting->name)); ?></p>
                    </span>
                <?php endif; ?>
                <p class='w-100'>The name of the menu item that appears on your site.</p>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           
            <div class="row m-0 p-3 w-100">
                <button type="submit" class="btn btn-primary ml-auto">Save</button>
            </div>
        </div>
           
    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.base.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>