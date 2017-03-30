<?php
session_start();
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
<script>
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
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
								<?php
									if(isset($_SESSION['login_user'])){
										echo("<li>Hello ".$_SESSION['login_user']."</li><div class='dropdown'>
  										<button onclick='myFunction()' class='dropbtn'>&#9776;&nbsp;</button>
  										<div id='myDropdown' class='dropdown-content'>
    										<a href='edit.php'><img src='edit.png' height='30' width='30' /></a>
    										<a href='logout.php'><img src='exit.png' height='30' width='30' </a></div></div>");
									}else{
									echo("<li><a href='login.php'>Log in</a></li>
								<li><a href='#footer'>Sign in</a></li>");
									}
								?>
							</ul>
						</nav>
					</div>


				<!-- Banner -->
					<div id="banner" class="container">
						<section>
							<p>At first I was hoping to make all 7 generations that exists, but I haven't had that much free time so I decided to make only 2 generations of pokemon series. This site is part of my college course, so if you are interested in this kind of studies, visit  <a href="http://www.mev.hr?lang=eng">MEV</a>.</p>
						</section>
					</div>


<?php
  
  $link = new mysqli("localhost", "root", "cigo7","pokemondb");
  $query="SELECT * FROM pokemon ORDER by id";
  $rezultat=$link->query($query, MYSQLI_STORE_RESULT);
   if ($rezultat) {
			while(list($id,$ime,$visina,$tezina,$opis,$slika,$id_user)=$rezultat->fetch_row()) { 
														echo "<div class='wrapper style1'><center><img src='Pokemon/".$slika."' /><p> $ime </br> $opis </br> HT: $visina </br> WT: $tezina</p></center></div>";

														
													}

		 }
$link->close();
?>

<?php
 
	  
	  
	  if (isset($_POST['predano'])) {
				if (isset($_POST['Email'])) $email=$_POST['Email'];
				if (isset($_POST['Password'])) $password=$_POST['Password'];
				 
			  if ($email!=""&&$password!="") {
				//rad s bazom
				
				$mysqli = new mysqli("localhost", "root", "cigo7", "pokemondb");
				if ($mysqli->connect_errno) {
				  die ('Error ' . $mysqli->connect_error);
				}
				$mysqli->set_charset("utf8");
				
			   $email=trim(htmlentities($email));
			   $password=trim(htmlentities($password));
			   
			   
			  $query=$mysqli->prepare("INSERT INTO korisnik (id, email, pass, stanje) VALUES (0, ?, ?, 2)"); 
				  $query->bind_param('ss', $email, $password );
				  
				  
			   if ($query->execute()) {
				  echo "Registration successful";
				 header('Location: index.php');
				  } else {
				  echo "Registration unsuccessful";
				  }
			   if ($mysqli->errno) {
				  die ('<br />Error: ' .  $mysqli->error);
				}
		  
					  
				
				$mysqli->close();
				
				
		  }
		  else echo "All fields are required";
				 
    }
	
	else {
        $password="";
        $email="";
    }
  
?>


				<!-- Main -->
					<div id="main">
						<div class="container">
							<div class="row"> 
								
								<!-- Content -->
								<div class="6u">
									<section>
										<ul class="style">
											<li class="fa fa-lightbulb-o">
												<h3>Idea for project</h3>
												<span>One day my collegue and I were walking home and I was complaining to him how I don't have any ideas for this project. He knew that I'm big fan of Pokemon, so he said to me: "Why don't you make Pokedex", and that's how it all started! </span> </li>
										</ul>
									</section>
								</div>
								<div class="6u">
									<section>
										<ul class="style">
											<li class="fa fa-cogs">
												<h3>Project by itself</h3>
												<span>I have downloaded template in which I saw potencial for my project. Original template looks like <a href="https://templated.co/phaseshift">this</a>. </span> </li>
                                        </ul>
									</section>
								</div>
							</div>
						</div>
					</div>

	</div>

	<!-- Footer -->
		<div id="footer" class="wrapper style2">
			<div class="container">
				<section>
					<header class="major">
						<h2>Sign in</h2>
						<span class="byline">It's your chance to show the world your Pokemon! </span>
					</header>
					<form method="post" action="#">
						<div class="row half">
							<div class="12u">
								<input class="text" type="text" name="email" style="text-align:center" placeholder="Email" />
							</div>
						</div>
						<div class="row half">
							<div class="12u">
								<input type="password" style="text-align:center" placeholder="password"/>
							</div>
						</div>
						<div class="row half">
							<div class="12u">
								<ul class="actions">
									<li>
										<input type="submit" value="Sign in" class="button alt" />
									</li>
								</ul>
							</div>
						</div>
					</form>
				</section>
			</div>
		</div>
	<!-- /Footer -->
	</body>
</html>