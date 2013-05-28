<?php include("includes/header_login.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login to Admin Penel</title>
<link rel="stylesheet" type="text/css" href="css/style_login.css" />
<script type="text/javascript" src="js/jq.js"></script>
<script type="text/javascript" src="js/myscript.js"></script>
</head>
<body>
	<?php 
		include("class/class.user.php");
		$user = new User();
		
	?>
	<div id="loginForm">
    	<div id="loginFormLeft">
        	<div id="loginFormRight">
            	<div id="loginHeader">
                	Retrive Password
                </div>
                <div id="loginCont">
                	<?php 
                        if(!isset($_REQUEST['step'])){
                            $_REQUEST['step']='';
                        }
						if($_REQUEST['step']==3){
							$user->email = $_POST['email'];
							$user->password = md5($_POST['password1']);
							$user->code = $_POST['code'];
							$user->updatePassword();
					?>
                            <script type="text/javascript">
								setTimeout('window.location= "index.php"',3000);
							</script>
					<?php
                        }
						elseif($_REQUEST['step']==2){
					?>
							<form id="password" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                            <table>
                                <tr>
                                    <td>Password:</td>
                                    <td>
                                        <div class="inputBox">
                                        <input type="password" name="password1" id="password1" /> <span class="password1 required"></span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Re-Password:</td>
                                    <td>
                                        <div class="inputBox">
                                        <input type="password" name="password2" id="password2" /> <span class="password2 required"></span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    	<input type="hidden" name="step" value="3" />
                                        <input type="hidden" name="code" value="<?php echo $_POST['code']; ?>" />
                                        <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>" />
                                    </td>
                                    <td align="right"><input type="image" name="login" src="images/btn_login.jpg" /></td>
                                </tr>
                            </table>
                            </form>	
					<?php
                        }
						elseif($_REQUEST['step']==1){
					?>
                    		<?php 
								$user->email = $_POST['email'];
								if($user->sendCode()):
							?>
                                    <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                                    <table>
                                        <tr>
                                            <td colspan="2">An Email has been sent to you with validation code. Please put it below.</td>
                                        </tr>
                                        <tr>
                                            <td>Code:</td>
                                            <td>
                                                <div class="inputBox">
                                                <input type="text" name="code" />
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            	<input type="hidden" name="step" value="2" />
                                                <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>" />
                                            </td>
                                            <td align="right"><input type="image" name="login" src="images/btn_login.jpg" /></td>
                                        </tr>
                                    </table>
                                    </form>
                        <?php 	
							endif; 
						}
						else {
					?>
                            <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                            <table>
                                <tr>
                                    <td>Enter Email:</td>
                                    <td>
                                        <div class="inputBox">
                                        <input type="text" name="email" />
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="hidden" name="step" value="1" /></td>
                                    <td align="right"><input type="image" name="login" src="images/btn_login.jpg" /></td>
                                </tr>
                            </table>
                            </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>