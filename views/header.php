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
	<link rel="stylesheet" type="text/css" href="<?= URL;?>public/themify-icons/themify-icons.css" />
	<link rel="stylesheet" type="text/css" href="<?= URL;?>public/datatables/datatables.min.css"/>
	<link rel="stylesheet" href="<?=URL?>public/css/main.css">
	<script src="<?=URL?>public/js/jquery.min.js"></script>
	<script src="<?=URL?>public/js/popper.min.js"></script>
	<script src="<?=URL?>public/js/bootstrap.min.js"></script>
	<script src="<?= URL;?>public/dataTables/datatables.min.js"></script>
	<script>
		const URL = '<?=URL?>';
	</script>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03"
		 aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand text-standard" href="#" style="font-weight: 800">Children's Clinic</a>

		<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link text-standard" href="<?= URL?>">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-standard" href="<?= URL?>patient">Patient Record</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-standard" href="<?= URL?>followup">Follow up Visit</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-standard" href="#">Billing</a>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link text-standard" href="<?=URL?>user/logout">Logout</a>
				</li>
			</ul>
		</div>
	</nav>
