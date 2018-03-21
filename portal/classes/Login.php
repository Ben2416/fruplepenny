<?php
class Login{
	private $db_connection = null;
	public $errors = array();
	public $messages = array();
	
	public function __construct(){
		session_start();
		if(isset($_GET["logout"])){
			$this->doLogout();
		}elseif(isset($_POST["login"])){
			$this->doLogin();
		}
	}
	
	private function doLogin(){
		if(empty($_POST["email"])){
			$this->errors[] = "Email field is empth.";
		}elseif(empty($_POST["password"])){
			$this->errors[] = "Password field is empty.";
		}elseif(!empty($_POST["email"]) && !empty($_POST["password"])){
			$this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			
			if(!$this->db_connection->set_charset("utf8")){
				$this->errors[] = $this->db_connection->error;
			}
			
			if(!$this->db_connection->connect_errno){
				$email = $this->db_connection->real_escape_string($_POST["email"]);
				$sql = "SELECT email, password
						FROM users
						WHERE email = '".$email."'";
				$result = $this->db_connection->query($sql);
				if($result == 1){
					$result_row = $result->fetch_object();
					if(password_verify($_POST["password"],$result_row->password)){
						$_SESSION["email"] = $result_row->email;
						$_SESSION["first_name"] = $result_row->first_name;
						$_SESSION["last_name"] = $result_row->last_name;
						$_SESSION["status"] = $result_row->status;
					}else{
						$this->errors[] = "wrong password. Try again.";
					}
				}else{
					$this->errors[] = "This user does not exist.";
				}
			}else{
				$this->errors[] = "Database connection problem.";
			}
		}
	}
	
	public function doLogout(){
		$_SESSION = array();
		session_destroy();
		$this->messages[] = "You have been logged out.";
	}
	
	public function isUserLoggedIn(){
		if(isset($_SESSION['status']) AND $_SESSION['status']==1){
			return true;
		}
		return false;
	}
	
}
?>