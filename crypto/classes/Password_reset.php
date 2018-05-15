<?php
class Password_reset{
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
		}elseif(!empty($_POST["forgot_email"])){
			$this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }
            if (!$this->db_connection->connect_errno) {
                $forgot_email = $this->db_connection->real_escape_string(strip_tags($_POST['forgot_email'], ENT_QUOTES));
				$sql = "SELECT * FROM users WHERE email = '" . $forgot_email . "'";
                $query_check_user_name = $this->db_connection->query($sql);
                if ($query_check_user_name->num_rows == 1) {
					if(mail()){
						$this->messages[] = "Recovery details sent successfully.";
					}else{
						$this->errors[] = "Mail not sent try again.";
					}
				}elseif($query_check_user_name->num_rows == 0){
					$this->errors[] = "Invalid Email Address.";
				} else {
					$this->errors[] = "Sorry, your password recovery failed. Please try again.";
				}
			}else {
                $this->errors[] = "Sorry, no database connection.";
            }
		}else {
            $this->errors[] = "An unknown error occurred.";
        }
	}
	
}