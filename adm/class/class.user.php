<?php
	class User{
		public $username;
		public $password;
		public $newPassword;
		public $message;
		public $oldEmail;
		public $newEmail;
		public $email;
		public $code;
		
		function __construct(){
		}
		
		public function changePassword(){
			$query = "SELECT * FROM admin WHERE username='$this->username' AND password = '$this->password'";
			$result = mysql_query($query,LINK) or die("Unable to run query to select user");
			if(mysql_num_rows($result)){
				$query = "UPDATE admin SET password = '$this->newPassword' WHERE username = '$this->username'";
				$result = mysql_query($query,LINK) or die("Unable to run query to update password");
				if(mysql_affected_rows(LINK)){
					$this->message = "Password has been updated successfully";
				}
				else {
					$this->message = "Password hasn't been updated";
				}
			}
			else {
				$this->message = "Old password is incorrect";
			}
		}
		
		public function changeEmail(){
			$query = "SELECT * FROM admin WHERE username='$this->username' AND email = '$this->oldEmail'";
			$result = mysql_query($query,LINK) or die("Unable to run Query");
			if(mysql_num_rows($result)){
				$query = "UPDATE admin SET email = '$this->newEmail' WHERE username = '$this->username'";
				$result = mysql_query($query,LINK) or die("Unable to Update Email Query");
				
				if(mysql_affected_rows(LINK)){
					$this->message = "Email has been updated";
				}
				else {
					$this->message = "Email hasn't been updated";
				}
			}
			else {
				$this->message = "Your Provided email address is incorrect";
			}
		}
		
		public function sendCode(){
			$code = mt_rand(9999999,10000000);
			$query = "UPDATE admin SET code = '$code' WHERE email='$this->email'";
			$result = mysql_query($query,LINK) or die("Unable to update Code");
			if(mysql_affected_rows(LINK)){
				if(mail($this->email,"Validation Code",$code)) {
					return true;
				}
				else {
					echo "Ther is an error to send the mail";
					return false;
				}
			}
			else {
				echo "Thank you very much.";
				return false;
			}
		}
		
		public function updatePassword(){
			$query = "UPDATE admin SET password = '$this->password' WHERE code = '$this->code' AND email = '$this->email'";
			$result = mysql_query($query,LINK) or die("Unable to Update Password");
			if(mysql_affected_rows(LINK)){
				echo "Password has been updated successfully";
			}
			else {
				echo "Password hasn't been updated";
			}
		}
	}
?>