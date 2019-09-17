<?php echo $__env->make('admin.base.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php if(isset($nav) && $nav == true): ?>
    <?php echo $__env->make('admin.base.nav', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="row m-0 page p-0">
        <?php if(isset($sidebar) && $sidebar == true): ?>
            <?php echo $__env->make('admin.base.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
        <div class="col content p-0">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>

<?php else: ?>
    <div class="row m-0 page page-fill p-0">
        <?php if(isset($sidebar) && $sidebar == true): ?>
            <?php echo $__env->make('admin.base.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
        <div class="col content p-0">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
<?php endif; ?>

<?php echo $__env->make('admin.base.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

