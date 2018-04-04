<?php
ob_start();
require_once("config/db.php");
require_once("classes/Login.php");

include "header.php";

$login = new Login();

if($login->isUserLoggedIn()==true){
	header("location:dashboard.php");
}else{
	include("views/login_view.php");
}

include("footer.php");
ob_end_flush();
?>
