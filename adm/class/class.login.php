<?php
	class Login{
		public $loginMessage;
		
		function __construct(){
			
		}
		
		// Function loginTest()- To test if the user is Logged in or not. If not, redirect to Login Page		
		function loginTest(){
			session_start();

			if(isset($_SESSION['username']) && ($_SESSION['urlBase']==BASE_PATH)){
			}
			else {
				$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
				$_SESSION['url'] = $url;
				header("Location: login.php");
			}
		}
		// End of Login Test
		
		// Function loginProcess()
		function loginProcess(){
			//session_start();
			$userName = mysql_real_escape_string($_POST['username'],LINK);
			$password = md5(mysql_real_escape_string($_POST['password'],LINK));
			
			$query = "SELECT * FROM admin WHERE username='$userName' AND password='$password'";
			$result = mysql_query($query,LINK) or die("Unable to run Query");
			if(mysql_num_rows($result)==1){
				$_SESSION['username']=$userName;
				$_SESSION['urlBase']=BASE_PATH;
				header("Location: $_SESSION[url]");
			}
			else {
				$this->loginMessage = "Username/Password Doesn't Match";
			}
		}
		//End of function loginProcess()
	}
?>