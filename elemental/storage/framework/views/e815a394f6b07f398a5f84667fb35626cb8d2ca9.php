<?php $__env->startSection('content'); ?>
    <section class="excerpt py-5 mt-5">
        <div class="container">
            
        </div>
    </section>
    
    <section class="contact py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-6">
                    <?php if(!is_null($page->fields()->where("name", 'contact-message')->first())): ?>
                        <?php echo $page->fields()->where("name", 'contact-message')->first()->value; ?>

                    <?php endif; ?>
                </div>
                <div class="col-sm-12 col-md-6 p-5 border">
                    <h4>Send a message</h4>
                    <p>Please fee free to contact us with any questions or concerns you might have.  </p>
                    <form method="post" action="<?php echo e(Route('mail')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control <?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" placeholder="first & last name" value="<?php echo e(old('name')); ?>"/>
                            <?php if($errors->has('name')): ?>
                                <span class="invalid-feedback d-block" role="alert">
                                    <p class="text-danger"><?php echo e($errors->first('name')); ?></p>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                        <label>Email</label>
                        <input class="form-control  <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" placeholder="youremail@email.com" value="<?php echo e(old('email')); ?>"/>
                         <?php if($errors->has('email')): ?>
                            <span class="invalid-feedback d-block" role="alert">
                                <p class="text-danger"><?php echo e($errors->first('email')); ?></p>
                            </span>
                        <?php endif; ?>
                        </div>
                        <div class="form-group">
                        <label>Subject</label>
                        <input class="form-control <?php echo e($errors->has('subject') ? ' is-invalid' : ''); ?>" name="subject" placeholder="subject" value="<?php echo e(old('subject')); ?>"/>
                        <?php if($errors->has('subject')): ?>
                            <span class="invalid-feedback d-block" role="alert">
                                <p class="text-danger"><?php echo e($errors->first('subject')); ?></p>
                            </span>
                        <?php endif; ?>
                        </div>
                        <div class="form-group">
                        <label>Message</label>
                        <textarea class="form-control <?php echo e($errors->has('message') ? ' is-invalid' : ''); ?>" name="message"  value="<?php echo e(old('message')); ?>"></textarea>
                        <?php if($errors->has('message')): ?>
                            <span class="invalid-feedback d-block" role="alert">
                                <p class="text-danger"><?php echo e($errors->first('message')); ?></p>
                            </span>
                        <?php endif; ?>
                        </div>
                        <div class="row m-0">
                            <button type="submit" class="btn btn-primary ml-auto">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.base.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>