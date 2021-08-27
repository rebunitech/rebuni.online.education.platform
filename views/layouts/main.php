<?php

use app\core\Application; ?>

<!--
=========================================================
* Argon Design System - v1.2.2
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-design-system
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
	<title>
	ROEP
	</title>
	<!--     Fonts and icons     -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
	<!-- Nucleo Icons -->
	<link href="assets/css/nucleo-icons.css" rel="stylesheet" />
	<link href="assets/css/nucleo-svg.css" rel="stylesheet" />
	<!-- Font Awesome Icons -->
	<link href="assets/css/font-awesome.css" rel="stylesheet" />
	<link href="assets/css/nucleo-svg.css" rel="stylesheet" />
	<!-- CSS Files -->
	<link href="assets/css/argon-design-system.css?v=1.2.2" rel="stylesheet" />
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<div class="container">
			<a class="navbar-brand ml--9" href="/">Rebuni Online Education Platform</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbar-default">
				<div class="navbar-collapse-header">
					<div class="row">
						<div class="col-6 collapse-brand">
							<a href="javascript:void(0)">ROEP</a>
						</div>
						<div class="col-6 collapse-close">
							<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
								<span></span>
								<span></span>
							</button>
						</div>
					</div>
				</div>

				<ul class="navbar-nav ml-lg-auto">
				<?php if (Application::$app->session->isAuthenticated()) : ?>
					<li class="nav-item dropdown">
						<a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="ni ni-circle-08"></i>
							<span class="nav-link-inner--text d-lg-none">User</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
						<a class="dropdown-item" href="/dashboard">Dashboard</a>
						<a class="dropdown-item" href="/profile">Profile</a>
						<a class="dropdown-item" href="/passwordchange">Change password</a>
							<a class="dropdown-item" href="/logout">Logout</a>
						</div>
					</li>
					<?php else: ?>
					<li class="nav-item dropdown">
						<a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="ni ni-settings-gear-65"></i>
							<span class="nav-link-inner--text d-lg-none">Settings</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
							<a class="dropdown-item" href="/login">Login</a>
							<a class="dropdown-item" href="/register">Register</a>
						</div>
					</li>
					<?php endif; ?>
				</ul>

			</div>
		</div>
	</nav>
	
	<?php if (Application::$app->session->getFlash('success')) : ?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<span class="alert-icon"><i class="ni ni-like-2"></i></span>
			<span class="alert-text"><strong><?php echo Application::$app->session->getFlash('success'); ?></strong></span>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	<?php endif; ?>
	{{content}}
 <!-- Footer -->
 <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6">
                <div class="copyright text-center  text-lg-left  text-muted">
                    © 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
                </div>
            </div>
            <div class="col-lg-6">
                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="assets/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <script src="assets/js/plugins/moment.min.js"></script>
  <script src="assets/js/plugins/datetimepicker.js" type="text/javascript"></script>
  <script src="assets/js/plugins/bootstrap-datepicker.min.js"></script>
  <!-- Control Center for Argon UI Kit: parallax effects, scripts for the example pages etc -->
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <script src="assets/js/argon-design-system.min.js?v=1.2.2" type="text/javascript"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-design-system-pro"
      });
  </script>
</body>

</html>