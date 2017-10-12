<?php include 'assets/config/config.inc.php' ?>
<?php include 'assets/objects/table.php' ?>
<?php include 'assets/objects/Page_top.php' ?>
<?php 

	$userIdTest = $_SESSION['userID'];
	$sql = "SELECT * FROM users WHERE id = '$userIdTest'";

	$result = $mysqli->query($sql);


	$res = $result->fetch_object();

	if($res->r_roles_id == 2){

	}
	else{
		header("Location: index.php"); 
	}

?>

<!doctype html>
<html lang="en">

<head>
	<title>Dashboard | Rzik</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="assets/css/ui.css">
	<link rel="stylesheet" href="assets/css/material.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<script src="assets/js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js'></script>
	<!-- <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png"> -->
	<!-- <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png"> -->
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.php"><img src="assets/img/logo.png" alt="Rzik Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
<!-- 				<form class="navbar-form navbar-left">
					<div class="input-group">
						<input type="text" value="" class="form-control" placeholder="Search dashboard...">
						<span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
					</div> -->
				</form>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<span><?php echo $_SESSION['username']; ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i>
							</a>
							<ul class="dropdown-menu">
							<form class="form" role="form" method="post" action="assets/ws/deconnexion.php" accept-charset="UTF-8" id="login-nav">
								<button type="submit" style="
									    background: transparent;
									    border: none;
									    margin: 0 auto;
									    text-align: center;
									    width: 100%;
									"><i class="lnr lnr-exit"></i> <span>Logout</span></button>
							</form>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
