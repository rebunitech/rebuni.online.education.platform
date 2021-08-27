<div class="card">
  <h5 class="card-header">Title: <?php echo $model->title; ?></h5>
  <div class="card-body">
    <p class="card-text"> <?php echo $model->description;?></p>
    <?php if ($model->is_paid && $model->price != 0 && !$model->user_paid): ?>
        <a href="<?php echo $model->checkoutUrl; ?>" class="btn btn-primary">Pay With <img style="width:100px" src=" https://yenepayprod.blob.core.windows.net/images/logo.png"> </a>
    <?php else: ?>
        <a href="/takeCourse?courseID=<?php echo $model->id; ?>" class="btn btn-primary">Take Course</a>
    <?php endif; ?>
  </div>
</div>