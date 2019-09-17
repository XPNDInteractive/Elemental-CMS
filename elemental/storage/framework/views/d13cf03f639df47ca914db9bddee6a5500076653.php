    


<?php $__env->startSection('content'); ?>
    <div class="row tools m-0 p-3 mb-4 align-items-center page-info">
        <div class="col col-md-5 mr-5 p-0">
            <h6 class=" m-0">Admin / Posts / Create</h6>
            
        </div>
        
       <?php if(isset($post->id)): ?>
         <a class="btn btn-primary ml-auto" href="<?php echo e(Route('posts_delete', ['id' => $post->id])); ?>">
            <i class="fas fa-trash"></i>
            Delete
        </a>
        <?php endif; ?>
        
    </div>
    <form  action="<?php echo e($action); ?>" method="post">
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
             <?php if(isset($post->id)): ?>
                <input type="hidden" name="id" value="<?php echo e($post->id); ?>"/>
             <?php endif; ?>
            <div class="row m-0 justify-content-center align-items-center">
                <div class="col-6">
                    <div class="col-sm-12 p-0 form-group">
                        <label>Post Title</label>
                        <input class="form-control <?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>" type="text" name="title" value="<?php echo e(isset($post->title) && $post->title !== null ? $post->title: old('title')); ?>"/>
                        <?php if($errors->has('title')): ?>
                            <span class="invalid-feedback d-block" role="alert">
                                <p class="text-danger"><?php echo e($errors->first('title')); ?></p>
                            </span>
                        <?php endif; ?>
                        <p class='w-100'>Please do not use any special characters in your title.  Please make your title clear and related to the intended content.</p>
                    </div>
            
                    <input name="slug" type="hidden" class="form-control <?php echo e($errors->has('slug') ? ' is-invalid' : ''); ?>" id="basic-url" aria-describedby="basic-addon3" value="<?php echo e(isset($post->slug) && $post->slug !== null ? str_replace('/blog/post/', '', $post->slug):old('slug')); ?>">
                    <div class="col-sm-12 p-0 form-group">
                        <label>Post Description</label>
                        <textarea class="form-control" name="description"><?php echo e(isset($post->description) && $post->description !== null ? $post->description:old('description')); ?></textarea>
                        <p>Please do not use any special characters in your title.  Please make your title clear and related to the intended content.</p>
                    </div>
                    <div class="col-sm-12 col-lg-12 p-0 form-group">
                        <label>Post Keywords</label>
                        <textarea class="form-control" name="description"><?php echo e(isset($post->keywords) && $post->keywords !== null ? $post->keywords:old('keywords')); ?></textarea>
                        <p>Please do not use any special characters in your title.  Please make your title clear and related to the intended content.</p>
                    </div>
                </div>
                <div class="col-6 row m-0 justify-content-center align-items-center flex-column p-5">
                    <?php if(old('image') == null && isset($post->media_id) && $post->media_id !== null): ?>
                         <img class="w-100 post-featured-image mb-5" src="<?php echo e(App\Media::where('id', $post->media_id)->first()->path); ?>"/>
                         <input class="post-image" type="hidden" name="image" value="<?php echo e($post->media_id); ?>"/>
                    <?php else: ?>  
                        <img class="w-100 post-featured-image mb-5" src="<?php echo e(old('image') !== null ? App\Media::where('id', old('image'))->first()->path:''); ?>"/>
                         <input class="post-image" type="hidden" name="image" value="<?php echo e(old('image')); ?>"/>
                    <?php endif; ?>
                   
                    
                    
                    <div class="post-image-placeholder w-100 row m-0 justify-content-center">
                        <?php if(old('image') == null && !isset($post->media_id)): ?>
                        <i style="font-size: 15rem;color: #f1f1f1;" class="fas fa-image"></i>
                        <?php endif; ?>
                        <div class="w-100 row m-0 justify-content-center">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                                Featured Media
                            </button>
                        </div>
                    </div>
                   
                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Post Image</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row m-0 post-images">
                                        <?php $__currentLoopData = $media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-4 post-image">
                                                <img data-id="<?php echo e($img->id); ?>" src="<?php echo e($img->path); ?>" class="img-thumbnail"/>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Finished</button>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
           

             
            <div class="w-100 h-100 border m-3 post-ql <?php echo e($errors->has('content') ? 'border-danger' : ''); ?>">
                
                
                <textarea name="content" class="content-editor" style="min-height: 300px;"><?php echo e(isset($post->content) && $post->content !== null ? $post->content : old('content')); ?></textarea>
            </div>
             
                 <?php if($errors->has('content')): ?>
                        <span class="invalid-feedback d-block ml-3" role="alert">
                            <p class="text-danger"><?php echo e($errors->first('content')); ?></p>
                        </span>
                    <?php endif; ?>
            <div class="row m-0 w-100 p-3">
                <div class="custom-control custom-switch">
                    <?php if(isset($post->active) && $post->active == true || old('status') == true): ?>
                    <input name="status" type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                    <?php else: ?>
                    <input name="status" type="checkbox" class="custom-control-input" id="customSwitch1">
                    <?php endif; ?>
                    <label class="custom-control-label" for="customSwitch1">Page Active?</label>
                </div>
                
                 
            </div>
            <div class="row m-0 p-3 w-100">
                <button type="submit" class="btn btn-primary ml-auto">Next</button>
            </div>
        </div>
           
    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.base.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>