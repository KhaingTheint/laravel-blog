
<?php $__env->startSection("content"); ?>
 <div class="container">
    <?php if(session('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo e(session('error')); ?>

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"></button>
    </div>
<?php endif; ?>
 <div class="card mb-2">
 <div class="card-body">
 <h5 class="card-title"><?php echo e($article->title); ?></h5>
 <div class="card-subtitle mb-2 text-muted small">   
     by <?php echo e($article->user->name); ?>,
 <?php echo e($article->created_at->diffForHumans()); ?>

 Category: <b><?php echo e($article->category->name); ?></b>
 </div>
 <p class="card-text"><?php echo e($article->body); ?></p>
 <a class="btn btn-warning"
 href="<?php echo e(url("/articles/delete/$article->id")); ?>">
 Delete
 </a>
 </div>
 </div>
 <ul class="list-group">
 <li class="list-group-item active">
 <b>Comments (<?php echo e(count($article->comments)); ?>)</b>
 </li>
 <?php $__currentLoopData = $article->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <li class="list-group-item">
 <?php echo e($comment->content); ?>

 <div class="small mt-2">
 By <b><?php echo e($comment->user->name); ?></b>,
 <?php echo e($comment->created_at->diffForHumans()); ?>

 </div>
 <?php if(auth()->guard()->check()): ?>
<a class=""
 href="<?php echo e(url("/comments/delete/$comment->id")); ?>">
 Delete
 </a>
 <?php endif; ?>
 </li>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 </ul>
<?php if(auth()->guard()->check()): ?>
<form action="<?php echo e(url('/comments/add')); ?>" method="post">
 <?php echo csrf_field(); ?>
 <input type="hidden" name="article_id"
 value="<?php echo e($article->id); ?>">
  <br>
 <textarea name="content" class="form-control mb-2"
 placeholder="New Comment"></textarea>
 <input type="submit" value="Add Comment"
 class="btn btn-secondary">
 </form>
<?php endif; ?>
 </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\workspace\laravel_blog\resources\views/articles/detail.blade.php ENDPATH**/ ?>