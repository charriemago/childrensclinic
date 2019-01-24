<?php

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Children's Clinic</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="<?=URL?>public/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?=URL?>public/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?= URL;?>public/pe-icon/css/pe-icon-7-stroke.css" />
		<link rel="stylesheet" type="text/css" href="<?= URL;?>public/pe-icon/css/helper.css" />
		<link rel="stylesheet" href="<?=URL?>public/css/main.css">
		<link rel="stylesheet" href="<?=URL?>public/css/login.css">
		<script src="<?=URL?>public/js/jquery.min.js"></script>
		<script src="<?=URL?>public/js/popper.min.js"></script>
		<script src="<?=URL?>public/js/bootstrap.min.js"></script>
		<script>
			const URL = "<?=URL?>";
		</script>
		<script src="<?=URL?>public/js/login.js"></script>

	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-5 col-lg-4 mx-auto">
					<form class="form-standard mt-100" id="loginForm">
						<div class="form-group mb-80">
							<h1 class="text-center text-light" style="font-weight: bolder;">Children's Clinic</h1>
						</div>
						<div class="form-group">
							<div class="input-group">
								<input class="form-control form-control-standard font-weight-light" type="text" placeholder="Username" name="username" required>
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="pe-7s-user pe-lg"></i></span>
								</div>
							</div>
						</div>
						<div class="form-group mt-4">
							<div class="input-group">
								<input class="form-control form-control-standard  font-weight-light" type="password" name="password" placeholder="Password" required>
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="pe-7s-key pe-lg" style="padding-right: 5px;"></i></span>
								</div>
							</div>
						</div><br>
						<div class="form-group mt-4">
							<button class="btn btn-outline-light btn-login btn-block"> Login</button>
						</div>
						<div class="form-group text-right">
							<!-- <a href="#" class="forgot-pass text-right">Forgot Password?</a> -->
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>