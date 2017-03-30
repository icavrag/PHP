<?php 
	  session_start();
 	  	 if($_SERVER["REQUEST_METHOD"] == "POST") {

     $link=mysqli_connect("localhost","root","cigo7","pokemondb");
		$email=mysqli_real_escape_string($link, $_POST['Email']);
		$password=mysqli_real_escape_string($link, $_POST['Password']);
     $query="SELECT * FROM korisnik WHERE email='$email' and pass='$password'";
	 $result=mysqli_query($link,$query);
	 $num=mysqli_num_rows($result);
	 $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	   if($num == 1) {
         $_SESSION['login_user'] = $email;
	 $_SESSION['user_id'] = $row['id'];
         
         header("location: index.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

<!DOCTYPE HTML>
<!--
	Phase Shift by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)	

-->
<html>
	<head>
		<title>Pokedex-PHP</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper -->
			<div class="wrapper style1">

				<!-- Header -->
					<div id="header" class="skel-panels-fixed">
						<div id="logo">
							<h1><a href="index.php">Pokedex</a></h1>
							<span class="tag">by Ivan Čavrag</span>
						</div>
						<nav id="nav">
							<ul>
								<li class="active"><a href="index.php">Homepage</a></li>
								<li><a href="first.php">First generation</a></li>
								<li><a href="second.php">Second generation</a></li>
								<li><a href="fan.php">Fan-made</a></li>
								<li><a href="login.php">Log in</a></li>
							</ul>
						</nav>
					</div>


		<div>
			<div class="container">
				<section>
					<header class="major">
						<h2>Log in</h2>
					</header>
					<form method="post" action="#">
						<div class="row half">
							<div class="12u">
								<input class="text" type="text" name="Email" style="text-align:center" placeholder="Email" />
							</div>
						</div>
						<div class="row half">
							<div class="12u">
								<input type="password" style="text-align:center" placeholder="password" name="Password"/>
							</div>
						</div>
						<div class="row half">
							<div class="12u">
								<ul class="actions">
									<li>
										<input type="submit" value="Login" class="button alt" name="predano" />
									</li>
								</ul>
							</div>
						</div>
					</form>
				</section>
			</div>
		</div>
	</body>
</html>