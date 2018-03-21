<?php

require_once("config/db.php");
require_once("classes/Login.php");

include "header.php";

$login = new Login();

if($login->isUserLoggedIn()==true){
	include("home.php");
}else{
	if(isset($_GET["p"]) && $_GET["p"]=="register"){
		include("register.php");
	}elseif(isset($_GET["p"]) && $_GET["p"]=="forgot_password"){
		include("forgot_password.php");
	}else{
		include("views/login_view.php");
	}
}

include("footer.php");
?>
