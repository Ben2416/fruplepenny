<?php
class Forgot_password{
	private $db_connection = null;
	public $errors = array();
	public $messages = array();
	
	public function __construct(){
		if(isset($_POST["forgot_password"])){
			$this->doForgot();
		}
	}
	
	private function doForgot(){
		if(empty($_POST["forgot_email"])){
			$error[] = "Email field is empty.";
		}
		$forgotmail = $_POST["forgot_email"];
		
	}
	
}