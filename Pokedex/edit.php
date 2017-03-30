<?php
	session_start();
?>

<?php
	if (isset($_POST['edit'])) {
				$mysqli = new mysqli("localhost", "root", "cigo7", "pokemondb");
				if ($mysqli->connect_errno) {
				  die ('Error ' . $mysqli->connect_error);
				}
				$mysqli->set_charset("utf8");
			   
			  $query=$mysqli->prepare("INSERT INTO pokemon (id, ime, visina, tezina, opis, slika, user_id) VALUES (0, '', '', '','',?, ?)"); 
				  $query->bind_param('sd', $slika, $_SESSION['user_id'] );					  
				
				$query->execute();
				$mysqli->close();
					}
?>

	<head>
		<title>Edit</title>
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
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body>
					<div class="wrapper style1">

				<!-- Header -->
					<div id="header" class="skel-panels-fixed">
						<div id="logo">
							<h1><a href="index.php">Pokedex</a></h1>
							<span class="tag">by Ivan &#268;avrag</span>
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
				<!-- Header -->
 
										<input type="submit" value="UPLOAD" class="button alt" name="edit" />

<?php
	$mysqli = new mysqli("localhost", "root", "cigo7", "pokemondb");
				if ($mysqli->connect_errno) {
				  die ('Error ' . $mysqli->connect_error);
				}
				$mysqli->set_charset("utf8");

	$user = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);
			   
			  $query="SELECT * FROM pokemon WHERE user_id = '$user'"; 
				   $result = mysqli_query($mysqli,$query);
	 			   $num = mysqli_num_rows($result);
	   if($num) {
				  while(list($id,$ime,$visina,$tezina,$opis,$slika,$id_user)=$rezultat->fetch_row()) { 
														echo "<div class='wrapper style1'><center><img src='Pokemon/".$slika."' /></center></div>";

														
													}

		 }					  

				$mysqli->close();
?>
	</body>