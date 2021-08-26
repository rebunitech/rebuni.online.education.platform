
<h1>Register</h1>
<?php use app\core\form\Field; use app\core\form\Form; ?>

<?php $form = Form::begin("", "post"); ?>
	<?php echo $form->field($model, 'first_name'); ?>
	<?php echo $form->field($model, 'last_name'); ?>
	<?php echo $form->field($model, 'email'); ?>
	<?php echo $form->field($model, 'username'); ?>
	<?php echo $form->field($model, 'password', Field::TYPE_PASSWORD); ?>
	<?php echo $form->field($model, 'passwordConfirm', Field::TYPE_PASSWORD); ?>
	<button type="submit">Register</button>
<?php echo Form::end(); ?>
