<?php
class Verify{
	private $db_connection = null;
	public $errors = array();
	public $messages = array();
	
	public function __construct(){
		if(isset($_GET["email"])){
			$this->doVerify();
		}
	}
	
	private function doVerify(){
		if(empty($_GET['email'])){
			$this->errors[] = "Empty Email";
		}elseif(strlen($_GET['email'])>64 || strlen($_GET['email'])<2){
			$this->errors[] = "Email cannot be shorter than 2 or longer than 64 characters.";
		}elseif(!filter_var($_GET['email'],FILTER_VALIDATE_EMAIL)){
			$this->errors[] = "Your email is not a valid emailformat";
		}elseif(
			!empty($_GET["email"])
			&& strlen($_GET["email"])<=64
			&& strlen($_GET["email"])>=2
			&& filter_var($_GET['email'],FILTER_VALIDATE_EMAIL)
		){
			$this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }
            if (!$this->db_connection->connect_errno) {
                $email = $this->db_connection->real_escape_string(strip_tags($_GET['email'], ENT_QUOTES));
                
				$sql = "SELECT * FROM users WHERE email = '" . $email . "'";
                $query_check_user_name = $this->db_connection->query($sql);
                if ($query_check_user_name->num_rows != 1) {
                    $this->errors[] = "Sorry, this email address is not registered.";
                } elseif($query_check_user_name->fetch_object()->activated == 1){
					$this->messages[] = "Your account is already activated. Please <a href='../portal/' class=''> Login</a>.";
				}else {
                    $sql = "UPDATE users
							SET activated=1
							WHERE email='".$email."'";
                    $query_new_user_insert = $this->db_connection->query($sql);
                    if ($query_new_user_insert) {
                        $this->messages[] = "Your account has been verified successfully. You can now <a href='../portal/' class=''> Login</a>.";
						
                    } else {
                        $this->errors[] = "Sorry, your verification failed. Please go back and try again.";
                    }
                }
            } else {
                $this->errors[] = "Sorry, no database connection.";
            }
        } else {
            $this->errors[] = "An unknown error occurred.";
        }
		
	}
}

?>