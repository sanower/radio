<?php include("includes/header.php"); ?>
	<script type="text/javascript" src="js/jq.js"></script>
    <script type="text/javascript" src="js/myscript.js"></script>
    <div id="content">   
    	<?php 
			if(!empty($_REQUEST['changePassword'])&&$_REQUEST['changePassword']) {
				include("class/class.user.php");
				$user = new User();
				$user->username = $_SESSION['username'];
				$user->password = md5($_POST['oldPassword']);
				$user->newPassword = md5($_POST['newPassword1']);
				$user->changePassword();
				echo '<div class="message">'.$user->message.'</div>';
			}
			else {
		?>
    	<form name="password" id="password" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<table>
        	<tr>
            	<th colspan="2" align="left">Change your password</th>
            </tr>
            <tr>
            	<td>Enter Old Password</td>
                <td><input type="password" class="password" name="oldPassword" id="oldPassword" /><span class="oldPassword required"></span></td>
            </tr>
            <tr>
            	<td>Enter New Password</td>
                <td><input type="password" class="password" name="newPassword1" id="newPassword1" /><span class="newPassword1 required"></span></td>
            </tr>
            <tr>
            	<td>Confirm New Password</td>
                <td><input type="password" class="password" name="newPassword2" id="newPassword2" /><span class="newPassword2 required"></span></td>
            </tr>
            <tr>
            	<td></td>
                <td><input type="submit" name="changePassword" value="Change Password" /></td>
            </tr>
        </table>
        </form>
        <?php } ?>
    </div>
<?php include("includes/footer.php"); ?>