<?php use app\core\Application; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PHP MVC</title>
</head>
<body>
	<div>
		<?php if (Application::$app->session->getFlash('success')): ?>
			<?php echo Application::$app->session->getFlash('success'); ?>
		<?php endif; ?>
	</div>
	<h1>HEAD</h1>
	<ul>
		<li><a href="/">Home</a></li>
		<li><a href="/contact">Contact</a></li>
		<li><a href="/login">Login</a></li>
		<li><a href="/register">Register</a></li>
	</ul>
	{{content}}
</body>
</html>