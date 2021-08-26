
<?php use app\core\form\Field; use app\core\form\Form; ?>
<div class="container mt-5" style="text-align: left;">
	<div class="card mx-auto" style="width: 80%;">
	  <div class="card-header text-center">
	  		<h2 class="text-muted">Register</h2>
	  </div>
	<?php $form = Form::begin("", "post"); ?>
		<?php echo $form->field($model, 'first_name'); ?>
		<?php echo $form->field($model, 'last_name'); ?>
		<?php echo $form->field($model, 'email'); ?>
		<?php echo $form->field($model, 'username'); ?>
		<?php echo $form->field($model, 'password', Field::TYPE_PASSWORD); ?>
		<?php echo $form->field($model, 'passwordConfirm', Field::TYPE_PASSWORD); ?>
		<div class="input-group mb-3">
		  <label class="input-group-text" for="user_type">Register as</label>
		  <select class="form-select" id="user_type" name="user_type">
		    <option value="school">School</option>
		    <option value="teacher">Teacher</option>
		    <option value="student">Student</option>
		  </select>
		</div>
		<button  class="btn btn-primary" type="submit">Register</button>
		<a href="/login">Aleardy have account?</a>
	<?php echo Form::end(); ?>
</div>
</div>
