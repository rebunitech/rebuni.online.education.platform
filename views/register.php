
<h1>Register</h1>
<?php use app\core\form\Field; ?>

<?php $form = app\core\form\Form::begin("", "post"); ?>
	<?php echo $form->field($model, 'first_name'); ?>
	<?php echo $form->field($model, 'last_name'); ?>
	<?php echo $form->field($model, 'email'); ?>
	<?php echo $form->field($model, 'username'); ?>
	<?php echo $form->field($model, 'password', Field::TYPE_PASSWORD); ?>
	<?php echo $form->field($model, 'passwordConfirm', Field::TYPE_PASSWORD); ?>
	<button type="submit">Register</button>
<?php echo app\core\form\Form::end(); ?>

<form action="" method="post">
<!-- 	<ul>
		<li>
			first name <input type="text" class="<?php echo $model->hasError('firstname') ? 'invalid' : '' ?>" name="firstname">
			<div>
				<?php echo $model->getFirstError('firstname'); ?>
			</div>
		</li>
		<li>
			last name <input type="text" name="lastname">
		</li>
		<li>
			email <input type="email" name="email">
		</li>
		<li>
			Password: <input type="password" name="password">
		</li>
		<li>
			Password Confirm: <input type="password" name="passwordConfirm">
		</li>
		<li>
			<button type="submit">Register</button>
		</li>
	</ul>
</form> -->