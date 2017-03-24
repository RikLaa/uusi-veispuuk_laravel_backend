<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>

<ul>
  <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <li>
    <a href="/posts/<?php echo e($post->postID); ?>">

      <?php echo e($post->content); ?>


  </li>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>

</body>
</html>
