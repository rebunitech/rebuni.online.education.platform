
<?php use app\core\form\Field; use app\core\form\Form; ?>
<div class="container mt-5" style="text-align: left;">
	<div class="card mx-auto" style="width:  100%;">
	  <div class="card-header text-center">
	  		<h2 class="text-muted">Login</h2>
	  </div>
	<?php $form = Form::begin("", "post"); ?>
		<?php echo $form->field($model, 'username'); ?>
		<?php echo $form->field($model, 'password', Field::TYPE_PASSWORD); ?>

		<button  class="btn btn-primary" type="submit">Login</button>
		<a href="/register">Need an account?</a>
	<?php echo Form::end(); ?>
</div>
</div>

