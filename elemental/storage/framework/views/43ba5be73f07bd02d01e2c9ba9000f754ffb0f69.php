<?php $__env->startSection('content'); ?>

 <?php if(!is_null($page->fields()->where("name", 'jumbotron-image')->first())): ?>
<div class="jumbotron jumbotron-fluid" style="background-image: url(<?php echo e($page->fields()->where("name", 'jumbotron-image')->first()->value); ?>)">
    <div class="row m-0 p-0">
       
    </div>
</div>

<?php else: ?>
<div class="jumbotron jumbotron-fluid" style="background-image: url(<?php echo e(url('/')); ?>/storage/media/banner.jpg);">
    
    <div class="row m-0 p-0">
       

        <form class="paypal-btn"  style="" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="TY8A3W7AD4TX2">
            <input style="height:60px;" type="image" src="https://bodyesteem.com/storage/media/ordernow.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
        </form>

    </div>
</div>
<?php endif; ?>

<section class="excerpt">
    <div class="container">
        <h3>
            <?php if(!is_null($page->fields()->where("name", 'intro-text')->first())): ?>
            <?php echo $page->fields()->where("name", 'intro-text')->first()->value; ?>

            <?php endif; ?>
        </h3>
        
    </div>
</section>
    <section class="intro">
        <div class="container">
             <div class="row">
                <?php if(!is_null($page->fields()->where("name", 'susan-image')->first())): ?>
                    <div class="author" style="background: url(<?php echo e($page->fields()->where("name", 'susan-image')->first()->value); ?>) 0 0 no-repeat;background-size:cover;"></div>
                <?php else: ?>
                     <div class="author" style="background: url(<?php echo e(url('/')); ?>/storage/media/susans_pic.png) 0 0 no-repeat;background-size:cover;"></div>
                <?php endif; ?>
                <div class="col-sm-12 col-md-8 bio">
                    <?php if(!is_null($page->fields()->where("name", 'author-info')->first())): ?>
                    <?php echo $page->fields()->where("name", 'author-info')->first()->value; ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
       
    </section>

    <section class="seminars">
        <div class="container">
            <div class="row m-0 p-0 py-5">
                <?php if(!is_null($page->fields()->where("name", 'seminar-series')->first())): ?>
                    <?php echo $page->fields()->where("name", 'seminar-series')->first()->value; ?>

                <?php endif; ?>
                
                <?php if(!is_null($page->fields()->where("name", 'wellness-center')->first())): ?>
                    <?php echo $page->fields()->where("name", 'wellness-center')->first()->value; ?>

                <?php endif; ?>
                
            </div>
            <div class="row m-0 p-0 seminars-body">
                <?php if(!is_null($page->fields()->where("name", 'cake')->first())): ?>
                    <div class="author" style="background: url(<?php echo e($page->fields()->where("name", 'cake')->first()->value); ?>) 0 0 no-repeat;background-size:cover;">
                <?php else: ?>
                     <div class="author" style="background: url(<?php echo e(url('/')); ?>/storage/media/icing.jpg) 0 0 no-repeat;background-size:cover;">
                <?php endif; ?>
                </div>
                <div class="col">
                    <?php if(!is_null($page->fields()->where("name", 'final-text')->first())): ?>
                    <?php echo $page->fields()->where("name", 'final-text')->first()->value; ?>

                    <?php endif; ?>
                     <form  style="margin-top: 3rem;" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="TY8A3W7AD4TX2">
                        <input type="image" style="height:50px;" src="https://bodyesteem.com/storage/media/ordernow.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                    </form>

                </div>
            </div>
            
            <div class="row m-0 p-0 mt-5 mb-2">
                <ul class="nav flex-column w-100">
                    <li class="nav-item row m-0 p-0 align-items-center bg-primary p-3 mb-2">
                        <a class="nav-link" href="http://bodyesteem.com/storage/media/BodyEsteem_Recipes_190528.pdf">
                            <h6 class="m-0 text-white">Delicious and Delectable Bonus Recipes</h6>
                        </a>
                       
                    </li>
                    <li class="nav-item row m-0 p-0 align-items-center bg-primary p-3 mb-2">
                        <a class="nav-link" href="http://bodyesteem.com/storage/media/Body Esteem Scoring 2.docx">
                            <h6 class="m-0 text-white">Scoring for Emotional Eating Assessment (pages 28,29)</h6>
                        </a>
                       
                    </li>
                </ul>
            </div>
        </div>
       
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.base.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>