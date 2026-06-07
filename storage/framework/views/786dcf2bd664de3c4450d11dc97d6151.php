
<?php $__env->startSection("content"); ?>
 <div class="container">
   <?php if(session('info')): ?>
 <div class="alert alert-info">
 <?php echo e(session('info')); ?>

 </div>
 <?php endif; ?>

    <?php echo e($articles->links()); ?>

 <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <div class="card mb-2">
 <div class="card-body">
 <h5 class="card-title"><?php echo e($article->title); ?></h5>
 <div class="card-subtitle mb-2 text-muted small">
  by <?php echo e($article->user->name); ?>,
 <?php echo e($article->created_at->diffForHumans()); ?>

 </div>
 <p class="card-text"><?php echo e($article->body); ?></p>
 <a class="card-link"
 href="<?php echo e(url("/articles/detail/$article->id")); ?>">
 View Detail &raquo;
 </a>
 </div>
 </div>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\workspace\laravel_blog\resources\views/articles/index.blade.php ENDPATH**/ ?>