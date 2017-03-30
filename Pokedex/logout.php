<?php
			   session_start();
			   if(isset($_SESSION['login_user'])){
			   session_destroy();
			   header("LOCATION: index.php");
			   }else
				header( "LOCATION: index.php" );
?>