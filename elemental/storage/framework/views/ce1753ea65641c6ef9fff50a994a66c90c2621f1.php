    


<?php $__env->startSection('content'); ?>
         <div class="w-100 p-5 row m-0 page-info text-white align-items-center">
            <a class="btn btn-primary mr-5" href="<?php echo e(Route('pages_create')); ?>">Back</a>
            <p class="mr-3 mb-0 "><strong class="">Title:</strong> <?php echo e($page->title); ?></p>
            <p class="mr-3 mb-0 "><strong class="">Slug:</strong> <?php echo e(url('/') . $page->slug); ?></p>
            <p class="mr-3 mb-0 "><strong class="">Template:</strong> <?php echo e($page->template); ?></p>
            <p class="mr-3 mb-0 "><strong class="">Status:</strong> <?php echo e($page->active == true ? 'Active':'Inactive'); ?></p>
            
        </div>
        <div class="row m-2 m-md-5">
           
            <div class="row m-0 w-100 align-items-start p-3">
                <button type="button" class="btn btn-primary mr-1" data-toggle="modal" data-target="#addMedia">
                    Add Media
                </button>
                <button type="button" class="btn btn-primary mr-1" data-toggle="modal" data-target="#addText">
                    Add Text
                </button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addHTML">
                    Add HTML
                </button>
                <p class="col-12 p-0 mt-2">Content fields allow you to easily extend the content fields available for your page.  This is also a convient and easy way to manage all the content on your pages.</p>
            </div>
            <div class="fields row m-0 w-100">
                <?php $__currentLoopData = $page->fields()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 p-0 w-100 card mb-5">
                        <div class="card-header m-0 row w-100 align-items-center">
                            <p class="m-0"><strong>Field Name:</strong> <?php echo e($field->name); ?></p>
                            <a href="<?php echo e(Route('pages_delete_block', ['id' => $field->id])); ?>" class="btn btn-primary ml-auto">Delete</a>
                        </div>
                        <div class="card-body">
                            <?php if($field->type == "text"): ?>
                            <p><?php echo $field->value; ?><p>
                            <?php endif; ?>
                            <?php if($field->type == "image"): ?>
                                <img class="w-25" src="<?php echo e($field->value); ?>"/>
                            <?php endif; ?>
                        </div>
                        
                        
                    </div> 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="row m-0 w-100">
                <a href="<?php echo e(Route('pages')); ?>" class="btn btn-primary ml-auto">Finished</a>
            </div>
        </div>

<div  class="modal fade <?php echo e(old('addMedia') ? "input-errors":null); ?>" id="addMedia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
       <form  action="<?php echo e(Route("pages_add_block")); ?>" method="post">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Add Media Field</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="content-field p-5 w-100">
                    <?php echo csrf_field(); ?>
                    <label>Field Name</label>
                    <input class="form-control mb-2 <?php echo e($errors->has('field-name') ? ' is-invalid' : ''); ?>" type="text" name="field-name" placeholder="field name" value="<?php echo e(old('field-title')); ?>"/>    
                     <?php if($errors->has('field-name')): ?>
                        <span class="invalid-feedback d-block" role="alert">
                            <p class="text-danger"><?php echo e($errors->first('field-name')); ?></p>
                        </span>
                    <?php endif; ?>
                    <input type="hidden" name="addMedia" value="addText"/>
                    <input type="hidden" name="page-id" value="<?php echo e($page->id); ?>"/>
                    <input type="hidden" name="field-type" value="image"/>
                    <label>Field Media</label>
                   
                    <div class="media-editor row m-0 justify-content-center border p-3 p-md-5 align-items-start flex-column text-left bg-white">
                        <img class="img <?php echo e($errors->has('field-content') ? ' border-danger' : ''); ?>" src="<?php echo e(old('field-content')); ?>"/>
                        <input type="hidden" name="field-content" value=""/>
                         <?php if($errors->has('field-content')): ?>
                            <span class="invalid-feedback d-block" role="alert">
                                <p class="text-danger"><?php echo e($errors->first('field-content')); ?></p>
                            </span>
                        <?php endif; ?>
                        <button type="button" class="btn btn-primary select-media">
                            Select Media <i class="fas fa-plus"></i>
                        </button>
                        <p class="w-50 mt-2">You are able to add various media elements to your page by uploading or linking as needed.</p>
                        <div class="row m-0 border p-0 p-md-5 align-items-center page-gallery" style="height: 400px; overflow-y:auto;">
                            <?php $__currentLoopData = $media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-12 col-md-6">
                                    <img data-item="<?php echo e($img->id); ?>" class="w-100 border p-2 bg-white gallery-item" src="<?php echo e($img->path); ?>"/>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    
                </div>
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>


<div  class="modal fade <?php echo e(old('addText') ? "input-errors":null); ?>" id="addText" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <form  action="<?php echo e(Route("pages_add_block")); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Add Text Field</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="content-field p-5 w-100">
                    <input type="hidden" name="addText" value="addText"/>
                     <input type="hidden" name="field-type" value="text"/>
                    <label>Field Name</label>
                    <input class="form-control mb-2" type="text" name="field-name" placeholder="field name" value="<?php echo e(old('field-title')); ?>"/>    
                     <?php if($errors->has('field-name')): ?>
                        <span class="invalid-feedback d-block" role="alert">
                            <p class="text-danger"><?php echo e($errors->first('field-name')); ?></p>
                        </span>
                    <?php endif; ?>
                    <label>Field Content</label>
                    <textarea name="field-content" class="content-editor"><?php echo e(old('field-content')); ?></textarea>
                     <?php if($errors->has('field-content')): ?>
                        <span class="invalid-feedback d-block" role="alert">
                            <p class="text-danger"><?php echo e($errors->first('field-content')); ?></p>
                        </span>
                    <?php endif; ?>
                    <input type="hidden" name="page-id" value="<?php echo e($page->id); ?>"/>
                        
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.base.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>