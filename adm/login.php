<?php include("includes/header_login.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login to Admin Penel</title>
<link rel="stylesheet" type="text/css" href="css/style_login.css" />
</head>
<body>
	<div id="loginForm">
    	<div id="loginFormLeft">
        	<div id="loginFormRight">
            	<?php if($login->loginMessage): ?>
                	<div id="loginMessage"><span class="error"><?php echo $login->loginMessage; ?></span></div>
                <?php endif; ?>
            	<div id="loginHeader">
                	Login to Admin Panel
                </div>
                <div id="loginCont">
                	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                    <table>
                    	<tr>
                        	<td>Username:</td>
                            <td>
                            	<div class="inputBox">
                            	<input type="text" name="username" value="Username" onfocus="if(this.value=='Username'){this.value='';}" onblur="if(this.value==''){this.value='Username'}" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                        	<td>Password</td>
                            <td>
                            	<div class="inputBox">
                            	<input type="password" name="password" value="Password" onfocus="if(this.value=='Password'){this.value='';}" onblur="if(this.value==''){this.value='Password'}" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                        	<td><input type="hidden" name="log" value="1" /></td>
                            <td align="right"><input type="image" name="login" src="images/btn_login.jpg" /></td>
                        </tr>
                        <tr>
                        	<td></td>
                            <td align="right"><a href="forget.php">Forgot Password</a></td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>