<?php include 'assets/config/config.inc.php' ?>

<!DOCTYPE html>
<html>
	<head>
		<title>RZIK</title>

		<!-- Meta -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    	<meta name="description"
          content="" />
    	<meta name="keywords"
          content=""/>
        <meta name="theme-color" content="#000">
        <!-- END Meta -->
		
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="assets/css/tools.css">
		<!-- END CSS -->

		<!-- Favicon -->
		<link rel="icon" type="image/x-icon"
          href="#" />
    	<link rel="shortcut icon" type="image/x-icon"
          href="#" />
        <!-- END Favicon -->  
        
        <!-- JQuery -->
		<script src="assets/js/jquery-3.2.1.min.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>

		<!-- Fixed navbar -->
		<nav id="header" class="navbar navbar-fixed-top">
		    <div id="header-container" class="container navbar-container">
		    	<div class="col-md-4">
			        <div class="navbar-header">
			            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			                <span class="sr-only">Toggle navigation</span>
			                <span class="icon-bar"></span>
			                <span class="icon-bar"></span>
			                <span class="icon-bar"></span>
			            </button>
					</div>
			            <a id="brand" class="navbar-brand" href="index.php">
			            	<img src="assets/img/logowhite.png" alt="">
			            	<img src="assets/img/logo.png" alt="">
<!-- 				            <img src="/Rzik/img/.png" alt="">
				            <img src="/Rzik/img/.png" alt=""> -->
			            </a>
			    </div>
		        <div class="col-md-8">
			        <div id="navbar" class="collapse navbar-collapse">
			            <ul class="nav navbar-nav">
			                <li><a href="#" class="hvr-center"></a></li>
			                <li><a href="#" class="hvr-center"></a></li>
			                <li><a href="#" class="hvr-horizontal" ></a></li>
							<li><a href="#" class="hvr-horizontal" ></a></li>
							<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
			<ul id="login-dp" class="dropdown-menu">
					 <div class="row">
							<div class="col-md-12">
								Login via
								<div class="social-buttons">
									<a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
									<a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
								</div>
                                or
								 <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
										<div class="form-group">
											 <label class="sr-only" for="exampleInputEmail2">Email address</label>
											 <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
										</div>
										<div class="form-group">
											 <label class="sr-only" for="exampleInputPassword2">Password</label>
											 <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                             <div class="help-block text-right"><a href="">Forget the password ?</a></div>
										</div>
										<div class="form-group">
											 <button type="submit" class="btn btn-primary btn-block">Sign in</button>
										</div>
										<div class="checkbox">
											 <label>
											 <input type="checkbox"> keep me logged-in
											 </label>
										</div>
								 </form>
							</div>
							<div class="bottom text-center">
								New here ? <a href="#"><b>Join Us</b></a>
							</div>
					 </div>
				</li>
				</a>
			            </ul>
			        </div><!-- /.nav-collapse -->
			    </div>
		    </div><!-- /.container -->
		</nav><!-- /.navbar -->