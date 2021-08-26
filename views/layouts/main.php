<?php use app\core\Application; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>ROEP</title>
  </head>
  <body>
  	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="#">ROEP</a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarText">
	      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
	        <li class="nav-item">
	          <a class="nav-link" aria-current="page" href="/">Home</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="/contact">Contact</a>
	        </li>
	      </ul>
	        <form class="d-flex">
	        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
	        <button class="btn btn-outline-success" type="submit">Search</button>
	        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link" aria-current="page" href="/login">Login</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="/register">Register</a>
		        </li>
		      </ul>
	      </form>

	    </div>
	  </div>
	</nav>
  	<?php if (Application::$app->session->getFlash('success')): ?>
  		<div class="alert alert-info" role="alert">
		  <?php echo Application::$app->session->getFlash('success'); ?>
		</div>
	<?php endif; ?>
    {{content}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

  </body>
</html>

<!-- <!DOCTYPE html>
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
	
</body>
</html> -->