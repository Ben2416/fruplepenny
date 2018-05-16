<?php 
class Users{
	private $db_connection = null;
	public $errors = array();
	public $messages = array(); 
	public $return_data = null;
	
	public function __construct($page=1){
		if(isset($_GET["page"]) && isset($_GET["userid"])){
			if($_GET["page"] == "profile"){
				if(isset($_POST["update_profile"])){
					$this->doProfileUpdate();
					$this->doProfile($_GET["userid"]);
				}else{
					$this->doProfile($_GET["userid"]);
				}
			}else{
				$this->doDeleteUser($_GET["userid"]);
				$page = $_GET["page_from"];
				if($page==1)
					$this->doAllUsers();
				elseif ($page==2)
					$this->doApprovedUsers();
				elseif($page==3)
					$this->doPendingUsers();
				elseif($page==4)
					$this->doBonusReview();
			}
		}else{ 
			if($page==1)
				$this->doAllUsers();
			elseif ($page==2)
				$this->doApprovedUsers();
			elseif($page==3)
				$this->doPendingUsers();
			elseif($page==4)
				$this->doBonusReview();
		}
	}
	
	private function doAllUsers(){
		$this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if(!$this->db_connection->set_charset("utf8")){
			$this->errors[] = $this->db_connection->error;
		}
		if(!$this->db_connection->connect_errno){
			$sql = "SELECT * FROM users";
			$result = $this->db_connection->query($sql);
			if($result->num_rows >=1){
				while($result_row = $result->fetch_object()){
				$out = "
				<tr class='gradeX'>
				  <td class='aligncenter'><span class='center'>
					<input type='checkbox' />
				  </span></td>
					<td>".$result_row->first_name." ".$result_row->last_name."</td>
					<td>".$result_row->email."</td>
					<td>".$result_row->phone_number."</td>
					<td class='center'>";
					$out .= ($result_row->activated == 1)?'Active':'Inactive';
					$out.="</td>
					<td class='center'><div class='btn-group'>
						<button data-toggle='dropdown' class='btn dropdown-toggle'>Action <span class='caret'></span></button>
						<ul class='dropdown-menu'>
						  <li><a href='profile.php?page=profile&userid=".$result_row->id."'>View Profile</a></li>
						  <li><a href='all_users.php?page=delete&userid=".$result_row->id."&page_from=1'>Delete Account</a></li>
						</ul>
					  </div></td>
				</tr>
				";
				echo $out;
				}
			}
		}else{
			$this->errors[] = "Database connection problem.";
		}
	}
	
	private function doApprovedUsers(){
		$this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if(!$this->db_connection->set_charset("utf8")){
			$this->errors[] = $this->db_connection->error;
		}
		if(!$this->db_connection->connect_errno){
			$sql = "SELECT * FROM users WHERE activated=1";
			$result = $this->db_connection->query($sql);
			if($result->num_rows >=1){
				while($result_row = $result->fetch_object()){
				$out = "
				<tr class='gradeX'>
				  <td class='aligncenter'><span class='center'>
					<input type='checkbox' />
				  </span></td>
					<td>".$result_row->first_name." ".$result_row->last_name."</td>
					<td>".$result_row->email."</td>
					<td>".$result_row->phone_number."</td>
					<td class='center'>";
					$out .= ($result_row->activated == 1)?'Active':'Inactive';
					$out.="</td>
					<td class='center'><div class='btn-group'>
						<button data-toggle='dropdown' class='btn dropdown-toggle'>Action <span class='caret'></span></button>
						<ul class='dropdown-menu'>
						  <li><a href='profile.php?page=profile&userid=".$result_row->id."'>View Profile</a></li>
						  <li><a href='approved_users.php?page=delete&userid=".$result_row->id."&page_from=2'>Delete Account</a></li>
						</ul>
					  </div></td>
				</tr>
				";
				echo $out;
				}
			}
		}else{
			$this->errors[] = "Database connection problem.";
		}
	}
	
	private function doPendingUsers(){
		$this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if(!$this->db_connection->set_charset("utf8")){
			$this->errors[] = $this->db_connection->error;
		}
		if(!$this->db_connection->connect_errno){
			$sql = "SELECT * FROM users WHERE activated=0";
			$result = $this->db_connection->query($sql);
			if($result->num_rows >=1){
				while($result_row = $result->fetch_object()){
				$out = "
				<tr class='gradeX'>
				  <td class='aligncenter'><span class='center'>
					<input type='checkbox' />
				  </span></td>
					<td>".$result_row->first_name." ".$result_row->last_name."</td>
					<td>".$result_row->email."</td>
					<td>".$result_row->phone_number."</td>
					<td class='center'>";
					$out .= ($result_row->activated == 1)?'Active':'Inactive';
					$out.="</td>
					<td class='center'><div class='btn-group'>
						<button data-toggle='dropdown' class='btn dropdown-toggle'>Action <span class='caret'></span></button>
						<ul class='dropdown-menu'>
						  <li><a href='profile.php?page=profile&userid=".$result_row->id."'>View Profile</a></li>
						  <li><a href='pending_users.php?page=delete&userid=".$result_row->id."&page_from=3'>Delete Account</a></li>
						</ul>
					  </div></td>
				</tr>
				";
				echo $out;
				}
			}
		}else{
			$this->errors[] = "Database connection problem.";
		}
	}
	
	private function doBonusReview(){
		$this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if(!$this->db_connection->set_charset("utf8")){
			$this->errors[] = $this->db_connection->error;
		}
		if(!$this->db_connection->connect_errno){
			$sql = "SELECT *, (SELECT COUNT(*)  FROM users u2 WHERE u2.referral_email=u1.email) AS total_referred FROM users u1";
			$result = $this->db_connection->query($sql);
			if($result->num_rows >=1){
				while($result_row = $result->fetch_object()){
				$out = "
				<tr class='gradeX'>
				  <td class='aligncenter'><span class='center'>
					<input type='checkbox' />
				  </span></td>
					<td>".$result_row->first_name." ".$result_row->last_name."</td>
					<td>".$result_row->email."</td>
					<td>".$result_row->total_referred."</td>
					<td>".($result_row->total_referred*7)."</td>
					<td class='center'><div class='btn-group'>
						<button data-toggle='dropdown' class='btn dropdown-toggle'>Action <span class='caret'></span></button>
						<ul class='dropdown-menu'>
						  <li><a href='profile.php?page=profile&userid=".$result_row->id."'>View Profile</a></li>
						  <li><a href='pending_users.php?page=delete&userid=".$result_row->id."&page_from=4'>Delete Account</a></li>
						</ul>
					  </div></td>
				</tr>
				";
				echo $out;
				}
			}
		}else{
			$this->errors[] = "Database connection problem.";
		}
	}
	
	private function doProfile($userid){
		if(empty($userid)){
			$error[] = "UserId field is empty.";
		}elseif(!empty($userid)){
			$this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }
			if(!$this->db_connection->connect_errno){
				$sql = "SELECT *, (SELECT COUNT(*)  FROM users u2 WHERE u2.referral_email=u1.email) AS total_referred FROM users u1
						WHERE id = '".$userid."'";
				$result = $this->db_connection->query($sql);
				if($result->num_rows == 1){
					$result_row = $result->fetch_object();
					$this->return_data = $result_row;
				}else{
					$this->errors[] = "This user does not exist.";
				}
			}else{
				$this->errors[] = "Database connection problem.";
			}
		}else {
            $this->errors[] = "An unknown error occurred.";
        }
	}
	
	private function doProfileUpdate(){
		if(empty($_POST['first_name'])){
			$this->errors[] = "Empty First Name";
		}elseif(empty($_POST['last_name'])){
			$this->errors[] = "Empty Last Name";
		}elseif(empty($_POST['email'])){
			$this->errors[] = "Empty Email";
		}elseif(empty($_POST['phone_number'])){
			$this->errors[] = "Empty Phone Number";
		}elseif(empty($_POST['package'])){
			$this->errors[] = "Empty Package";
		}elseif(empty($_POST["password"])){
			$this->errors[] = "Empty Password";
		}elseif(
			!empty($_POST["first_name"])
			&& !empty($_POST["last_name"])
			&& !empty($_POST["email"])
			&& !empty($_POST["phone_number"])
			&& !empty($_POST["package"])
			&& !empty($_POST["password"])
		){
			$this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }
            if (!$this->db_connection->connect_errno) {
                $first_name = $this->db_connection->real_escape_string(strip_tags($_POST['first_name'], ENT_QUOTES));
                $last_name = $this->db_connection->real_escape_string(strip_tags($_POST['last_name'], ENT_QUOTES));
                $email = $this->db_connection->real_escape_string(strip_tags($_POST['email'], ENT_QUOTES));
                $phone_number = $this->db_connection->real_escape_string(strip_tags($_POST['phone_number'], ENT_QUOTES));
                $package = $this->db_connection->real_escape_string(strip_tags($_POST['package'], ENT_QUOTES));
                $password = $this->db_connection->real_escape_string(strip_tags($_POST['password'], ENT_QUOTES));
                
				$userid = $this->db_connection->real_escape_string($_POST["userid"]);
				$sql = "SELECT *
						FROM users
						WHERE id = '".$userid."'";
				$result = $this->db_connection->query($sql);
				if($result->num_rows == 1){
					$result_row = $result->fetch_object();
					$password_hash = password_hash($password, PASSWORD_DEFAULT);
					$sql = "Update users 
					SET first_name='".$first_name."', last_name='".$last_name."', email='".$email."', 
					phone_number='".$phone_number."', package='".$package."', password = '".$password."' 
					WHERE id='".$userid."'";
					$query_update_profile = $this->db_connection->query($sql);
					if($query_update_profile){
						$this->messages[] = "Profile update successful.";
					}else{
						$this->errors[] = "Sorry, could not update profile. Please go back and try again.";
					}
				}else{
					$this->errors[] = "This user does not exist.";
				}
			}else {
                $this->errors[] = "Sorry, no database connection.";
            }
		}else{
			$this->errors[] = "An unknown error occurred. A field is missing";
		}
	}
	
	private function doDeleteUser($userid){
		if(empty($userid)){
			$error[] = "UserId field is empty.";
		}elseif(!empty($userid)){
			$this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }
            if (!$this->db_connection->connect_errno) {
                $sql = "DELETE FROM users WHERE id = '" . $userid . "'";
                $query_check_user_name = $this->db_connection->query($sql);
                if ($query_check_user_name) {
					$this->messages[] = "User deleted successfully.";
					//header("location:all_users.php");
				}else {
					$this->errors[] = "Sorry, your user delete failed. Please try again.";
				}
			}else {
                $this->errors[] = "Sorry, no database connection.";
            }
		}else {
            $this->errors[] = "An unknown error occurred.";
        }
	}
}
?>