    


<?php $__env->startSection('content'); ?>
    <div class="row tools m-0 p-3 mb-4 align-items-center page-info">
        <div class="col col-md-5 mr-5 p-0">
            <h6 class=" m-0">Admin / Pages / Create</h6>
           
        </div>
        <?php if(isset($page->id)): ?>
         <a class="btn btn-primary ml-auto" href="<?php echo e(Route('pages_delete', ['id' => $page->id])); ?>">
            <i class="fas fa-trash"></i>
            Delete
        </a>
        <?php endif; ?>
    </div>
    <form action="<?php echo e(Route('pages_save')); ?>" method="post">
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
                <label>Page Title</label>
                <input class="form-control <?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>" type="text" name="title" value="<?php echo e(isset($page->title) && $page->title !== null ? $page->title: old('title')); ?>"/>
                <?php if($errors->has('title')): ?>
                    <span class="invalid-feedback d-block" role="alert">
                        <p class="text-danger"><?php echo e($errors->first('title')); ?></p>
                    </span>
                <?php endif; ?>
                <p class='w-100'>Please do not use any special characters in your title.  Please make your title clear and related to the intended content.</p>
            </div>
            <div class="col-sm-12 col-lg-6 form-group">
                <label>Page Slug</label>
                <div class="input-group w-100">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3"><?php echo e(url('/')); ?></span>
                    </div>
                    <input name="slug" type="text" class="form-control <?php echo e($errors->has('slug') ? ' is-invalid' : ''); ?>" id="basic-url" aria-describedby="basic-addon3" value="<?php echo e(isset($page->slug) && $page->slug !== null ? $page->slug:old('slug')); ?>">
                    
                </div>
                 <?php if($errors->has('slug')): ?>
                        <span class="invalid-feedback d-block" role="alert">
                            <p class="text-danger"><?php echo e($errors->first('slug')); ?></p>
                        </span>
                    <?php endif; ?>
                    <p>Please do not use any special characters in your title.  Please make your title clear and related to the intended content.</p>
            </div>
            <div class="col-sm-12 col-lg-6 form-group">
                <label>Page Meta Description</label>
                <textarea class="form-control" name="description"><?php echo e(isset($page->description) && $page->description !== null ? $page->description:old('description')); ?></textarea>
                <p>Please do not use any special characters in your title.  Please make your title clear and related to the intended content.</p>
            </div>
             <div class="col-sm-12 col-lg-6 form-group">
                <label>Page Meta Keywords</label>
                <textarea class="form-control" name="keywords"><?php echo e(isset($page->keywords) && $page->keywords !== null ? $page->keywords:old('keywords')); ?></textarea>
                <p>Please do not use any special characters in your title.  Please make your title clear and related to the intended content.</p>
            </div>
            <div class="col-sm-12 col-lg-12 form-group">
                <label>Page Template</label>
               <select name="template" class="custom-select">
                   <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(isset($page->template) && basename($template) == $page->template || basename($template) == old('template')): ?>
                        <option value="<?php echo e(basename($template)); ?>" selected><?php echo e(basename($template)); ?></option>
                        <?php else: ?>
                         <option value="<?php echo e(basename($template)); ?>"><?php echo e(basename($template)); ?></option>
                        <?php endif; ?>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="row m-0 w-100 p-3">
                <div class="custom-control custom-switch">
                    <?php if(isset($page->template) && $page->active == true || old('status') == true): ?>
                    <input name="status" type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                    <?php else: ?>
                    <input name="status" type="checkbox" class="custom-control-input" id="customSwitch1">
                    <?php endif; ?>
                    <label class="custom-control-label" for="customSwitch1">Page Active?</label>
                </div>
                 <div class="custom-control custom-switch ml-5">
                        <?php if(isset($page->template) && $page->frontpage == true || old('frontpage') == true): ?>
                            <input name="frontpage" type="checkbox" class="custom-control-input" id="customSwitch2" checked>
                        <?php else: ?>
                             <input name="frontpage" type="checkbox" class="custom-control-input" id="customSwitch2">
                        <?php endif; ?>
                    <label class="custom-control-label" for="customSwitch2">Page is front page?</label>
                </div>
                 
            </div>
            <div class="row m-0 p-3 w-100">
                <button type="submit" class="btn btn-primary ml-auto">Next</button>
            </div>
        </div>
           
    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.base.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>