<?php
/**

*
**/
error_reporting(0);

class User
{	
	private $conn;
		
	function __construct(){
		include_once("db_connect.php");
		$db = new Database();
		// echo "connected";
		$this->conn = $db->connect(); 
	}
		

	public function userLogin($student_prn,$student_password){
	 	$pre_stmt = $this->conn->prepare("SELECT * FROM student_login WHERE student_prn = ?");
		$pre_stmt->bind_param("s",$student_prn);
		$pre_stmt->execute() or die($this->conn->error);
		$result = $pre_stmt->get_result();
		if($result->num_rows < 1){
			return array("status" => false, "message" => "User Doesnt Exist"); 
		}else{
			$row = $result->fetch_assoc();
			if($student_password == $row["student_password"]){
				return array("status" => true, "message" => "Login Successful");
			}else{
				return array("status" => false, "message" => "Wrong password!!");
			}
			
		}
	
	}
	
	private function emailExists($email){
		$pre_stmt = $this->conn->prepare("SELECT student_table FROM user WHERE e_mail = ? ");
		$pre_stmt->bind_param("s",$email);
		$pre_stmt->execute() or die($this->conn->error);
		$result = $pre_stmt->get_result();
		if($result->num_rows > 0){
			return 1;
		}else{
			return 0;
		} 
	}

	
	public function createUserAccount($username,$email,$password,$usertype){
		if($this->emailExists($email)){
			return "EMAIL_ALREADY_EXISTS";
		}else{
			$pre_stmt = $conn->prepare("INSERT INTO `student_table`(`student_prn`,`first_name`,`last_name`,`branch`,`year`,`phone_number`,`e_mail`) 
			VALUES(?,?,?,?,?,?,?)");
            $pre_stmt->bind_param("sssssis",$student_prn,$student_fname,$student_lname,$branch,$year,$phone_number,$e_mail);
			$result = $pre_stmt->execute() or die ($conn->error);			
			if($result > 0){
				?>
						<script>
							alert("Data inserted sucessfully");
						</script>
				<?php
			}else{
				return "SOME_ERROR";
			}
		
			} 
		}
	

}

$user = new User();
header('Content-Type: application/json');
$username = $_POST["student_prn"];
$pwd = $_POST["student_password"];
if(isset($username) && isset($pwd)){
	$usertest = $user->userLogin($username,$pwd);	
	//echo json_encode($usertest);
	session_start();
	$_SESSION["username"] = $username;
	$_SESSION["pwd"] = $pwd;
	//print_r($_SESSION);
	echo json_encode($usertest);
} 


?>
