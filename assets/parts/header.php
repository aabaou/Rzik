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
    	<meta name="description" content="" />
    	<meta name="keywords" content=""/>
        <meta name="theme-color" content="#000">
        <!-- END Meta -->
		
		<!-- CSS -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
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
  <script>
    window.fbAsyncInit = function() {
      // FB JavaScript SDK configuration and setup
      FB.init({
        appId      : '830871210408145', // FB App ID
        cookie     : true,  // enable cookies to allow the server to access the session
        xfbml      : true,  // parse social plugins on this page
        version    : 'v2.8' // use graph api version 2.8
      });

      // Check whether the user already logged in
      FB.getLoginStatus(function(response) {
        if (response.status === 'connected') {
          //display user data
          getFbUserData();
        }
      });
    };

    // Load the JavaScript SDK asynchronously
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    // Facebook login with JavaScript SDK
    function fbLogin() {
      FB.login(function (response) {
        if (response.authResponse) {
          // Get and display the user profile data
          getFbUserData();
        } else {
          document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
        }
      }, {scope: 'email'});
      location.reload();
    }

    // Fetch the user profile data from facebook
    function getFbUserData(){
      FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture'},
        function (response) {
          document.getElementById('login-dp').setAttribute("onclick","fbLogout()");
          document.getElementById('login-dp').innerHTML = 'Logout from Facebook';
          document.getElementById('status').innerHTML = 'Thanks for logging in, ' + response.first_name + '!';
          document.getElementById('userData').innerHTML = '<p><b>FB ID:</b> '+response.id+'</p><p><b>Name:</b> '+response.first_name+' '+response.last_name+'</p><p><b>Email:</b> '+response.email+'</p><p><b>Gender:</b> '+response.gender+'</p><p><b>Locale:</b> '+response.locale+'</p><p><b>Picture:</b> <img src="'+response.picture.data.url+'"/></p><p><b>FB Profile:</b> <a target="_blank" href="'+response.link+'">click to view profile</a></p>';
          // Save user data
          saveUserData(response);

        });
    }

    // Logout from facebook
    function fbLogout() {
      FB.logout(function() {
        document.getElementById('desconn').setAttribute("onclick","fbLogin()");
        document.getElementById('desconn').innerHTML = '<img src="fblogin.png"/>';
        document.getElementById('userData').innerHTML = '';
        document.getElementById('status').innerHTML = 'You have successfully logout from Facebook.';
      });
    }

    // Save user data to the database
    function saveUserData(userData){
      $.post('assets/ws/userData.php', {userData: JSON.stringify(userData)}, function(){return true;});


      /*$data = JSON.stringify(userData);
      console.dir($data);
      $.ajax({
        url : 'assets/ws/userData.php',
        contentType: "html",
        type: "POST",
        data : "userData="+$data.toString(),
        success: function(response, statut){
          alert(statut);
          console.dir(response);
          $('#log').append(response);

        }
      }).fail(function() {
        notify.danger("Erreur inconnue");
      });*/
    }

  </script>
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
		        <div class="col-md-6">
			        <div id="navbar" class="collapse navbar-collapse">
			            <ul class="nav navbar-nav">
<!-- 			            <li><a href="#" class="hvr-center"></a></li>
			                <li><a href="#" class="hvr-center"></a></li>
			                <li><a href="#" class="hvr-horizontal" ></a></li>
							<li><a href="#" class="hvr-horizontal" ></a></li> -->
							<li><a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<?php 
								if(isset($_SESSION['connect'])){ 
									echo("<b>".$_SESSION['username']."</b>"); 
							?> 
								<span class="caret"></span>
									<?php 
										if(isset($_SESSION['connect'])){ 
											echo("<b>".$_SESSION['username']."</b>"); 
									?> 
									<span class="caret"></span>
								</a>
<<<<<<< HEAD
			<ul id="login-dp" class="dropdown-menu">
					 <div class="row">
							<div class="col-md-12">
								 <form class="form" role="form" method="post" action="assets/ws/deconnexion.php" accept-charset="UTF-8" id="login-nav">
										<div class="form-group">
											 <button type="submit" class="hvr-horizontal blue">Disconnect</button>
=======
								<ul id="login-dp" class="dropdown-menu">
									<div class="row">
										<div class="col-md-12">
											<form class="form" role="form" method="post" action="assets/ws/deconnexion.php" accept-charset="UTF-8" id="login-nav">
												<div class="form-group">
													<button type="submit" class="btn btn-primary btn-block"><?php echo($dico['disconnect']); ?></button>
												</div>
											</form>
>>>>>>> 42a91ffc5f67961ed0ec06243ab785766bf9b579
										</div>
									</div>
									<?php
										}else{echo("<b>".$dico['login']."</b>");
									?> 
									<span class="caret"></span>
								</a>
			<ul id="login-dp" class="dropdown-menu">
					 <div class="row">
							<div class="col-md-12">
								Login via
								<div class="social-buttons">
									<a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
									<a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
								</div>
                                or
								 <form class="form" role="form" method="post" action="assets/ws/connexion.php" accept-charset="UTF-8" id="login-nav">
										<div class="form-group">
											 <label class="sr-only" for="exampleInputEmail2">Email address</label>
											 <input name="email" type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
										</div>
										<div class="form-group">
											 <label class="sr-only" for="exampleInputPassword2">Password</label>
											 <input name="password" type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                             <div class="help-block text-right"><a href="">Forget the password ?</a></div>
										</div>
										<div class="form-group">
											 <button type="submit" class="btn btn-primary btn-block">Sign in</button>
								<ul id="login-dp" class="dropdown-menu">
									<div class="row">
										<div class="col-md-12">
											<?php echo($dico['login_via']); ?>
											<div class="social-buttons">
												<a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
												<a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
											</div>
											<?php echo($dico['or']); ?>
											<form class="form" role="form" method="post" action="assets/ws/connexion.php" accept-charset="UTF-8" id="login-nav">
												<div class="form-group">
													<label class="sr-only" for="exampleInputEmail2"><?php echo($dico['email_adress']); ?></label>
													<input name="email" type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
												</div>
												<div class="form-group">
													<label class="sr-only" for="exampleInputPassword2"><?php echo($dico['password']); ?></label>
													<input name="password" type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
													<div class="help-block text-right"><a href=""><?php echo($dico['forget_password']); ?></a></div>
												</div>
												<div class="form-group">
													<button type="submit" class="btn btn-primary btn-block"><?php echo($dico['sign_in']); ?></button>
												</div>
												<div class="checkbox">
													<label>
														<input type="checkbox"> <?php echo($dico['keep_login']); ?>
													</label>
												</div>
											</form>
										</div>
										<div class="bottom text-center">
											<?php echo($dico['new_here']); ?> <a href="inscription.php"><b><?php echo($dico['join_us']); ?></b></a>
										</div>
									</div>
									<?php 
										}  
									?>
							</li>
						</a>
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
			
			
			
			<div class="col-md-2">
				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
<!-- 			            <li><a href="#" class="hvr-center"></a></li>
						<li><a href="#" class="hvr-center"></a></li>
						<li><a href="#" class="hvr-horizontal" ></a></li>
						<li><a href="#" class="hvr-horizontal" ></a></li> -->
						<li><a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<b><?php  echo($dico['language']); ?></b>
								<span class="caret"></span>
							</a>
							<ul id="login-dp" class="dropdown-menu">
								<div class="row">
									<div class="col-md-12">
										<a href="assets/ws/language.php?lang=fr"> <?php echo($dico['french']); ?> </a>  <?php if($_SESSION['lang'] == 'fr'){ echo("<i class='fa fa-check' aria-hidden='true'></i>"); } ?>  <br>
										<a href="assets/ws/language.php?lang=en"> <?php echo($dico['english']); ?> </a> <?php if($_SESSION['lang'] == 'en'){ echo("<i class='fa fa-check' aria-hidden='true'></i>"); } ?>
									</div>
								</div>
						</li>
					</a>
				</ul>
			</div><!-- /.nav-collapse -->
		</div>
			
			
			
		</div><!-- /.container -->
	</nav><!-- /.navbar -->
