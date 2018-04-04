<?php
class Password_update{
	private $db_connection = null;
	public $errors = array();
	public $messages = array();
	
	public function __construct(){
		//session_start();
		if(isset($_POST["password_update"])){
			$this->doUpdate();
		}
	}
	
	private function doUpdate(){
		if(empty($_POST["current_password"])){
			$this->errors[] = "Empty Current Password";
		}elseif(empty($_POST["new_password"])){
			$this->errors[] = "Empty New Password";
		}elseif(empty($_POST["confirm_password"])){
			$this->errors[] = "Empty Confirm Password";
		}elseif($_POST["new_password"] !== $_POST["confirm_password"]){
			$this->errors[] = "New and Confirm Passwords are not the same.";
		}elseif(
			!empty($_POST["current_password"])
			&& !empty($_POST["new_password"])
			&& !empty($_POST["confirm_password"])
		){
			$this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }
            if (!$this->db_connection->connect_errno) {
                $current_password = $this->db_connection->real_escape_string(strip_tags($_POST['current_password'], ENT_QUOTES));
                $new_password = $this->db_connection->real_escape_string(strip_tags($_POST['new_password'], ENT_QUOTES));
                $confirm_password = $this->db_connection->real_escape_string(strip_tags($_POST['confirm_password'], ENT_QUOTES));
                
				$email = $this->db_connection->real_escape_string($_SESSION["email"]);
				$sql = "SELECT *
						FROM users
						WHERE email = '".$email."'";
				$result = $this->db_connection->query($sql);
				if($result->num_rows == 1){
					$result_row = $result->fetch_object();
					if(password_verify($current_password,$result_row->password)){
						$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
						$sql = "Update users SET password = '".$password_hash."' WHERE email='".$email."'";
						$query_change_password = $this->db_connection->query($sql);
						if($query_change_password){
							$this->messages[] = "Password update successful.";
						}else{
							$this->errors[] = "Sorry, could not update password. Please go back and try again.";
						}
					}else{
						$this->errors[] = "Wrong current password. Try again.";
					}
				}else{
					$this->errors[] = "This user does not exist.";
				}
			}else {
                $this->errors[] = "Sorry, no database connection.";
            }
		}else{
			$this->errors[] = "An unknown error occurred.";
		}
	}
}

?>