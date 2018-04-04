<?php
class Account{
	private $db_connection = null;
	public $errors = array();
	public $messages = array();
	
	public function __construct(){
		session_start();
		if(isset($_POST["manageAccount"])){
			$this->updateInfo();
		}elseif(isset($_POST["changePass"])){
			$this->updatePassword();
		}
	}
	
	private function updateInfo(){
		if(empty($_POST['first_name'])){
			$this->errors[] = "Empty First Name";
		}elseif(empty($_POST['last_name'])){
			$this->errors[] = "Empty Last Name";
		}elseif(empty($_POST['address'])){
			$this->errors[] = "Empty Address";
		}elseif(empty($_POST['mobile_number'])){
			$this->errors[] = "Empty Mobile Number";
		}elseif(
			!empty($_POST["first_name"])
			&& !empty($_POST["last_name"])
			&& !empty($_POST["mobile_number"])
			&& !empty($_POST["address"])
		){
			$this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }
            if (!$this->db_connection->connect_errno) {
                $first_name = $this->db_connection->real_escape_string(strip_tags($_POST['first_name'], ENT_QUOTES));
                $last_name = $this->db_connection->real_escape_string(strip_tags($_POST['last_name'], ENT_QUOTES));
                $mobile_number = $this->db_connection->real_escape_string(strip_tags($_POST['mobile_number'], ENT_QUOTES));
                $address = $this->db_connection->real_escape_string(strip_tags($_POST['address'], ENT_QUOTES));
                
				$sql = "UPDATE users 
						SET first_name='" . $first_name . "',last_name='".$last_name."',mobile_number='" . $mobile_number . "',address='".$address."'
						WHERE email='".$_SESSION['email']."'";
				$query_new_user_insert = $this->db_connection->query($sql);
				if ($query_new_user_insert) {
					$this->messages[] = "Your account has been updated successfully.";
				} else {
					$this->errors[] = "Sorry, your registration failed. Please go back and try again.";
				}
            } else {
                $this->errors[] = "Sorry, no database connection.";
            }
        } else {
            $this->errors[] = "An unknown error occurred.";
        }
		$data['errors']=$this->errors;
		$data['messages']=$this->messages;
		echo json_encode($data);
	}
	
	private function updatePassword(){
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
		$data['errors']=$this->errors;
		$data['messages']=$this->messages;
		echo json_encode($data);
		//if(!empty($this->errors))echo json_encode($this->errors);
		//else echo json_encode($this->messages);
	}
}
?>