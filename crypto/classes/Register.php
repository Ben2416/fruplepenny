<?php
class Register{
	private $db_connection = null;
	public $errors = array();
	public $messages = array();
	
	public function __construct(){
		if(isset($_POST["register"])){
			$this->doRegister();
		}
	}
	
	private function doRegister(){
		if(empty($_POST['first_name'])){
			$this->errors[] = "Empty First Name";
		}elseif(empty($_POST['last_name'])){
			$this->errors[] = "Empty Last Name";
		}elseif(empty($_POST['email'])){
			$this->errors[] = "Empty Email";
		}elseif(empty($_POST['mobile_number'])){
			$this->errors[] = "Empty Mobile Number";
		}elseif(empty($_POST["password"]) || empty($_POST["confirm_password"]) ){
			$this->errors[] = "Empty Password";
		}elseif($_POST["password"] !== $_POST["confirm_password"]){
			$this->errors[] = "Passwords are not the same.";
		}elseif(strlen($_POST['email'])>64 || strlen($_POST['email'])<2){
			$this->errors[] = "Email cannot be shorter than 2 or longer than 64 characters.";
		}elseif(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
			$this->errors[] = "Your email is not a valid emailformat";
		}elseif(
			!empty($_POST["first_name"])
			&& !empty($_POST["last_name"])
			&& !empty($_POST["email"])
			&& !empty($_POST["mobile_number"])
			&& !empty($_POST["address"])
			&& !empty($_POST["referral_email"])
			&& !empty($_POST["mobile_number"])
			&& strlen($_POST["email"])<=64
			&& strlen($_POST["email"])>=2
			&& filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)
			&& !empty($_POST["password"])
			&& !empty($_POST["confirm_password"])
			&& ($_POST["password"]===$_POST["confirm_password"])
		){
			$this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }
            if (!$this->db_connection->connect_errno) {
                $first_name = $this->db_connection->real_escape_string(strip_tags($_POST['first_name'], ENT_QUOTES));
                $last_name = $this->db_connection->real_escape_string(strip_tags($_POST['last_name'], ENT_QUOTES));
                $email = $this->db_connection->real_escape_string(strip_tags($_POST['email'], ENT_QUOTES));
                $country = $_POST["country"];
				$mobile_number = $this->db_connection->real_escape_string(strip_tags($_POST['mobile_number'], ENT_QUOTES));
                $address = $this->db_connection->real_escape_string(strip_tags($_POST['address'], ENT_QUOTES));
                $referral_email = $this->db_connection->real_escape_string(strip_tags($_POST['referral_email'], ENT_QUOTES));
				
				$password = $_POST['password'];
                $password_hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "SELECT * FROM users WHERE email = '" . $email . "'";
                $query_check_user_name = $this->db_connection->query($sql);
                if ($query_check_user_name->num_rows == 1) {
                    $this->errors[] = "Sorry, that email address is already taken.";
                } else {
                    $sql = "INSERT INTO users (first_name, last_name, email, password,country,mobile_number,address,referral_email)
                            VALUES('" . $first_name . "', '".$last_name."', '" . $email . "', '" . $password_hash . "', '".$country."', '" . $mobile_number . "',  '".$address."', '" . $referral_email . "');";
                    $query_new_user_insert = $this->db_connection->query($sql);
                    if ($query_new_user_insert) {
                        $this->messages[] = "Your account has been created successfully. You can now log in.";
                    } else {
                        $this->errors[] = "Sorry, your registration failed. Please go back and try again.";
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