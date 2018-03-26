<?php
class Dashboard{
	private $db_connection = null;
	public $errors = array();
	public $messages = array();
	
	public function __construct(){
		if(isset($_GET['logout'])){
			$this->doLogout();
			header('Location:../');
		}
	}
	
	private function doLogout(){
		$_SESSION = array();
		session_destroy();
	}
}
?>