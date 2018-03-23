<?php
	session_start();
	doLogout();
	header('location:../portal/');
	
	function doLogout(){
		$_SESSION = array();
		session_destroy();
		//$this->messages[] = "You have been logged out.";
	}
?>