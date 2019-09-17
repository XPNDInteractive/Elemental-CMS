    


<?php $__env->startSection('content'); ?>
    <div class="row tools m-0 p-3 mb-4 align-items-center page-info">
        <div class="col col-md-5 mr-5 p-0">
            <h6 class=" m-0">Admin / Users / Create</h6>
            
        </div>
        
        <?php if(isset($page->id)): ?>
         <a class="btn btn-primary ml-auto" href="<?php echo e(Route('pages_delete', ['id' => $page->id])); ?>">
            <i class="fas fa-trash"></i>
            Delete
        </a>
        <?php endif; ?>
        
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
            <div class="col-sm-12 col-lg-6 form-group">
                <label>Name</label>
                <input class="form-control <?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" type="text" name="name" value="<?php echo e(isset($page->name) && $page->name !== null ? $page->name: old('name')); ?>"/>
                <?php if($errors->has('name')): ?>
                    <span class="invalid-feedback d-block" role="alert">
                        <p class="text-danger"><?php echo e($errors->first('name')); ?></p>
                    </span>
                <?php endif; ?>
                <p class='w-100'>Please do not use any special characters in your title.  Please make your title clear and related to the intended content.</p>
            </div>
            <div class="col-sm-12 col-lg-6 form-group">
                <label>Email</label>
                <input class="form-control <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" type="text" name="email" value="<?php echo e(isset($page->email) && $page->email !== null ? $page->email: old('email')); ?>"/>
                <?php if($errors->has('email')): ?>
                    <span class="invalid-feedback d-block" role="alert">
                        <p class="text-danger"><?php echo e($errors->first('email')); ?></p>
                    </span>
                <?php endif; ?>
                <p class='w-100'>Please do not use any special characters in your title.  Please make your title clear and related to the intended content.</p>
            </div>

              <div class="col-sm-12 col-lg-6 form-group">
                <label>Password</label>
                <input class="form-control <?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" type="password" name="password" value="<?php echo e(isset($page->password) && $page->password !== null ? $page->password: old('password')); ?>"/>
                <?php if($errors->has('password')): ?>
                    <span class="invalid-feedback d-block" role="alert">
                        <p class="text-danger"><?php echo e($errors->first('password')); ?></p>
                    </span>
                <?php endif; ?>
                <p class='w-100'>Please do not use any special characters in your title.  Please make your title clear and related to the intended content.</p>
            </div>

              <div class="col-sm-12 col-lg-6 form-group">
                <label>Confirm Password</label>
                <input class="form-control <?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" type="password" name="password_confirmation" value=""/>
              
                <p class='w-100'>Please do not use any special characters in your title.  Please make your title clear and related to the intended content.</p>
            </div>
            
          
            <div class="row m-0 p-3 w-100">
                <button type="submit" class="btn btn-primary ml-auto">Next</button>
            </div>
        </div>
           
    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.base.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>