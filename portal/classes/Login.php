<?php
class Login{
	private $db_connection = null;
	public $errors = array();
	public $messages = array();
	
	public function __construct(){
		session_start();
		/*if(isset($_GET["logout"])){
			$this->doLogout();
		}else*/if(isset($_POST["login"])){
			$this->doLogin();
		}
	}
	
	private function doLogin(){
		//$_SESSION = array();//do logout
		//session_destroy();//do logout
		
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
				$sql = "SELECT *
						FROM users
						WHERE email = '".$email."'";
				$result = $this->db_connection->query($sql);
				if($result->num_rows == 1){
					$result_row = $result->fetch_object();
					if(password_verify($_POST["password"],$result_row->password)){
						$_SESSION["email"] = $result_row->email;
						$_SESSION["first_name"] = $result_row->first_name;
						$_SESSION["last_name"] = $result_row->last_name;
						$_SESSION["status"] = $result_row->status;
						$_SESSION["country_code"] = $result_row->country_code;
						$_SESSION["phone_number"] = $result_row->phone_number;
						$_SESSION["id_type"] = $result_row->id_type;
						$_SESSION["id_number"] = $result_row->id_number;
						$_SESSION["package"] = $result_row->package;
						$_SESSION["exchange_method"] = $result_row->exchange_method;
						$_SESSION["withdrawal_details"] = $result_row->withdrawal_details;
						$_SESSION["referral_email"] = $result_row->referral_email;
						
						header('Location:dashboard.php');
					}else{
						$this->errors[] = "Wrong password. Try again.";
					}
				}else{
					$this->errors[] = "This user does not exist.";
				}
			}else{
				$this->errors[] = "Database connection problem.";
			}
		}
	}
	
	public function isUserLoggedIn(){
		if(isset($_SESSION['status']) AND $_SESSION['status']==1){
			return true;
		}
		return false;
	}
	
}
?>