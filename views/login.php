
<?php
use app\core\Application;
use app\core\form\Form; 
?>
<div class="col-lg-5">
  <div class="card bg-secondary shadow border-0">
    <div class="card-body px-lg-5 py-lg-5">
      <h3>Login</h3>
      <?php if (Application::$app->session->getFlash('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <span class="alert-icon"><i class="ni ni-like-2"></i></span>
          <span class="alert-text"><strong><?php echo Application::$app->session->getFlash('success'); ?></strong></span>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <?php endif; ?>
      
      <?php $form = Form::begin("", "post"); ?>
        <?php if ($model->hasError('__non_field_error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <span class="alert-text"> <?php echo $model->getFirstError('__non_field_error'); ?></span>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php endif; ?>
        <div class="form-group mb-3">
          <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="ni ni-email-83"></i></span>
            </div>
            <input class="form-control" placeholder="username" name="username" type="text">
          </div>
          <div class="text-danger mt-1 ml-2"><?php echo $model->getFirstError('username'); ?></div>
        </div>
        <div class="form-group focused">
          <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
            </div>
            <input class="form-control" placeholder="Password" type="password" name="password">
          </div>
          <div class="text-danger mt-1 ml-2"><?php echo $model->getFirstError('password'); ?></div>
        </div>
        <div class="custom-control custom-control-alternative custom-checkbox">
          <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
          <label class="custom-control-label" for=" customCheckLogin"><span>Remember me</span></label>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary my-4">Sign in</button>
        </div>
      <?php echo Form::end(); ?>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-6">
      <a href="#" class="text-light"><small>Forgot password?</small></a>
    </div>
    <div class="col-6 text-right">
      <a href="/register" class="text-light"><small>Create new account</small></a>
    </div>
  </div>
</div>

